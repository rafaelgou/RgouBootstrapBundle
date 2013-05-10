/*
 * FuelUXDataSource for Fuel UX Datagrid
 * 
 * @see https://github.com/adamalex/fuelux-dgdemo
 * @author Adam Alexander
 * @author Rafael Goulart <rafaelgou@gmail.com>
 */

var FuelUXDataSource = function (options) {
	this._formatter = options.formatter;
	this._columns   = options.columns;
	this._table     = options.table;
	this._url       = options.url;
	this._delay     = options.delay || 800;
};

FuelUXDataSource.prototype = {

	/**
	 * Returns stored column metadata
	 */
	columns: function () {
		return this._columns;
	},

	/**
	 * Called when Datagrid needs data. Logic should check the options parameter
	 * to determine what data to return, then return data by calling the callback.
	 * @param {object} options Options selected in datagrid (ex: {pageIndex:0,pageSize:5,search:'searchterm'})
	 * @param {function} callback To be called with the requested data.
	 */
	data: function (options, callback) {

		url         = this._url;
		table       = this._table;
		self        = this;
        requestData = new Object();

        requestData.pageSize = options.pageSize;
        requestData.page     = options.pageIndex + 1;

        if (options.sortProperty) {
            requestData.sortProperty = options.sortProperty;
            requestData.sortDirection = options.sortDirection;
        }

		if (options.search) {
            requestData.search = options.search;
        }
        
        var formFilter = $('<form>');
        $('#' + table + ' .filter input, #' + table + ' .filter select').each(function() {
            if ($(this).val() != '') {
                clone = $(this).clone();
                clone.val($(this).val());
                formFilter.append(clone);
            }
        });
        
        $.ajax(url, {

            dataType: 'json',
            data: $.param(requestData) + '&' + formFilter.serialize(),
            type: 'GET'

        }).done(function (response) {

            // Prepare data to return to Datagrid
            var data       = response.data;
            var count      = response.count;
            var startIndex = (response.page - 1) * response.perpage;
            var endIndex   = startIndex + response.perpage;
            var end        = (endIndex > count) ? count : endIndex;
            var pages      = response.pages;
            var page       = response.page;
            var start      = startIndex + 1;

            // Allow client code to format the data
            if (self._formatter) self._formatter(data);

            // Return data to Datagrid
            callback({data: data, start: start, end: end, count: count, pages: pages, page: page});
        });

	}
};

function rgouBootstrapGrid(options)
{
	$('#' + options.table).datagrid({
		dataSource: new FuelUXDataSource({

			// Column definitions for Datagrid
			columns:  options.columns,
            table:    options.table,
            url:      $('#' + options.table).attr('data-url')

		}),
		itemsText: options.itemsText,
		itemText: options.itemText
	});

    /*
     * Creating filter row
     */
    filterRow = $('<tr id="' + options.table + '_table_filter" class="filter alert alert-warning" style="display:none" />');
    
    $.each( options.columns, function(key, data) {
        if ( data.property != 'record_actions' && data.property != '') {
            
            if (data.filtertype == undefined) {
                data.filtertype = false;
            }
            
            if (data.filtertype == 'select' && data.filteroptions == undefined) {
                data.filtertype = 'input';
            }
            
            if (data.filtertype) {
                switch (data.filtertype) {
                    case 'select':
                        select = $('<select id="filter_' + data.property + '" name="filter[' + data.property + ']" style="width:90%;" />');
                        count = 0;
                        $.each(data.filteroptions, function(key, item) {
                            count = count + 1;
                            select.append($('<option value="' + item[0] + '" />').append(item[1]));
                        });
                        filterRow.append($('<th />').append(select));
                        break;

                    case 'date':
                        filterRow.append($('<th />').append('<input id="filter_' + data.property +   '" name="filter[' + data.property + ']" type="date" style="width:90%" class="datepicker" />'));
                        break;

                    case 'daterange':
                        filterRow.append($('<th />').append(
                            '<input id="filter_' + data.property +   '_from" name="filter[' + data.property + '][from]" type="date" style="width:90%" class="datepicker" />'
                            + '<br/>' + 
                            '<input id="filter_' + data.property +   '_to" name="filter[' + data.property + '][to]" type="date" style="width:90%" class="datepicker" />'
                        ));
                        break;

                    default:
                    case 'input':
                        filterRow.append($('<th />').append('<input id="filter_' + data.property +   '" name="filter[' + data.property + ']" type="text" style="width:90%" />'));
                        break;
                }
            } else {
                filterRow.append($('<th />').append('&nbsp;'));
            }
                
        } else {
            filterRow.append($('<th />').append('&nbsp;'));
        }
    });
    
    $('#' + options.table + ' thead').append(filterRow);   
 
    /*
     * Reload data on filters change
     */ 
    $('#' + options.table + ' .filter input, #' + options.table + ' .filter select').on('change', function() {
        $('#' + options.table).data('datagrid').reload();
    });

    /*
     * Toggle filter row
     */ 
    $('#' + options.table + ' button.table_filter_toggle').on('click', function() {
       $('#' + options.table + '_table_filter').toggle();
       if ($('#' + options.table + '_table_filter').is(':visible')) {
           label_toggle = $('#' + options.table + ' button.table_filter_toggle').attr('data-label-invisible');
       } else {
           label_toggle = $('#' + options.table + ' button.table_filter_toggle').attr('data-label-visible');
       }
       $('#' + options.table + ' button.table_filter_toggle span').html(label_toggle);
    });
    
    /*
     * Clear filters
     */ 
    $('#' + options.table + ' button.table_filter_clear').on('click', function() {
        $.each( options.columns, function(key, data) {
            if ( data.property != 'actions' ) {
                $('#filter_' + data.property).val(undefined);
            }
        });
        $('#' + options.table).data('datagrid').reload();
    });
    

}
