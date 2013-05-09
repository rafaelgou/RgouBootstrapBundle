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

		var url         = this._url;
		var table       = this._table;
		var self        = this;
        var requestData = new Object();

        requestData.pageSize = options.pageSize;
        requestData.page     = options.pageIndex + 1;

        if (options.sortProperty) {
            requestData.sortProperty = options.sortProperty;
            requestData.sortDirection = options.sortDirection;
        }

		if (options.search) {
            requestData.search = options.search;
        }
        
        var filter = new Object();
        $('#' + table + ' .filter input').each(function() {
            if ($(this).val() != '') {
                filter[$(this).attr('id')] = $(this).val();
            }
        });
        requestData.filter = filter;
        
        $.ajax(url, {

            // Set JSONP options for Flickr API
            dataType: 'json',
            data: requestData,
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
            callback({ data: data, start: start, end: end, count: count, pages: pages, page: page });
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

    filterRow = '';
    $.each( options.columns, function(key, data) {
        if ( data.property != 'actions' ) {
            filterRow = filterRow + '<th><input id="filter_' + data.property +   '" style="width:99%"></th>';
        } else {
            filterRow = filterRow + '<th>&nbsp;</th>';
        }
    });
    
    $('#' + options.table + ' thead').append(
        '<tr id="' + options.table + '_table_filter" class="filter alert alert-warning" style="display:none">'
        + filterRow
        + '<tr>'
    );   
 
    // Reload data on filter change
    $('#' + options.table + ' .filter input').on('change', function() {
        $('#' + options.table).data('datagrid').reload();
    });

    // Toggle filter row
    $('#' + options.table + ' button.table_filter_toggle').on('click', function() {
       $('#' + options.table + '_table_filter').toggle();
       if ($('#' + options.table + '_table_filter').is(':visible')) {
           label_toggle = $('#' + options.table + ' button.table_filter_toggle').attr('data-label-invisible');
       } else {
           label_toggle = $('#' + options.table + ' button.table_filter_toggle').attr('data-label-visible');
       }
       $('#' + options.table + ' button.table_filter_toggle span').html(label_toggle);
    });
    
    // Clear filters
    $('#' + options.table + ' button.table_filter_clear').on('click', function() {
        $.each( options.columns, function(key, data) {
            if ( data.property != 'actions' ) {
                $('#filter_' + data.property).val(undefined);
            }
        });
        $('#' + options.table).data('datagrid').reload();
    });
    

}
