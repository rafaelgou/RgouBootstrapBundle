<?php

namespace Rgou\BootstrapBundle\Util;


use Sonata\IntlBundle\Templating\Helper\DateTimeHelper;
use Sonata\IntlBundle\Templating\Helper\NumberHelper;

/**
 * MongoDB Utils
 *
 * @author Rafael Goulart <rafaelgou@gmail.com>
 */
class MongoDB
{

    const ACCENT_STRINGS = 'ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËẼÌÍÎÏĨÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëẽìíîïĩðñòóôõöøùúûüýÿ';
    const NO_ACCENT_STRINGS = 'SOZsozYYuAAAAAAACEEEEEIIIIIDNOOOOOOUUUUYsaaaaaaaceeeeeiiiiionoooooouuuuyy';

    protected $datetimehelper;
    protected $numberhelper;
    
    public function __construct(DateTimeHelper $datetimehelper, NumberHelper $numberhelper)
    {
        $this->datetimehelper = $datetimehelper;
        $this->numberhelper   = $numberhelper;
    }    
    
    /**
    * Returns a string with accent to REGEX expression to find any combinations
    * in accent insentive way
    *
    * @param string $text The text.
    * @param string $separator The separator
    *
    * @return string The text slugified.
    */
    public function accentToRegex($text)
    {
        $from = str_split(utf8_decode(self::ACCENT_STRINGS));
        $to   = str_split(strtolower(self::NO_ACCENT_STRINGS));
        $text = utf8_decode($text);

        $regex = array();
        
        foreach ($to as $key => $value) {
            if (isset($regex[$value])) {
                $regex[$value] .= $from[$key];
            } else {
                $regex[$value] = $value;
            }
        }
        
        foreach ($regex as $rg_key => $rg) {
            $text = preg_replace("/[$rg]/", "_{$rg_key}_", $text);
        }
        
        foreach ($regex as $rg_key => $rg) {
            $text = preg_replace("/_{$rg_key}_/", "[$rg]", $text);
        }
        
        return utf8_encode($text);
    }
    
    public function prepareValueForQuery($type, $value)
    {
    
        switch($type) {
            
            case 'id':
                $value = new \MongoId($value);
                break;
                
            case 'custom_id': // @MongoDB/Id(strategy="AUTOINCREMENT")
                if ($value == (int) $value) {
                    $value = (int) $value;
                }
                break;
                
            case 'boolean':
                $value = (bool) $value;
                break;
                
            case 'float':
                $value = (float) $value;
                break;
                
            case 'int':
                $value = (int) $value;
                break;
        
            case 'string':
                $value = new \MongoRegex('/.*' . $this->accentToRegex($value) . '.*/i');
                break;

            case 'date':
                $value = new \MongoDate($this->datetimehelper->getDatetime($value)->getTimestamp());
                break;

            default:
            case 'bin_data_custom':
            case 'bin_data_func':
            case 'bin_data_md5':
            case 'bin_data':
            case 'bin_data_uuid':
            case 'file':
            case 'hash':
            case 'int':
            case 'key':
            case 'increment':
            case 'timestamp':
                break;
        }
        
        return $value;
    }

    public function prepareValueForView($type, $value)
    {
    
        switch($type) {
            
            case 'boolean':
                $value = $value ? 'Yes' : 'No';
                break;
                
            case 'float':
                $value = $this->$numberhelper->formatDecimal($value);
                break;
                
            case 'date':
                $value = $this->datetimehelper->formatDate($value);
                break;
                
            default:
            case 'id':
            case 'custom_id': // @MongoDB/Id(strategy="AUTOINCREMENT")
            case 'string':
            case 'int':
            case 'bin_data_custom':
            case 'bin_data_func':
            case 'bin_data_md5':
            case 'bin_data':
            case 'bin_data_uuid':
            case 'file':
            case 'hash':
            case 'int':
            case 'key':
            case 'increment':
            case 'timestamp':
                break;
        }
        
        return $value;
    }
    
    public function prepareIdForFind($id)
    {
        $tmpId = (int) $id;

        // Check for autoincrement Id
        if ($id == (string) $tmpId) {
            $id = (int) $id;
        }
          
        return $id;
    }

    
    
    
}
