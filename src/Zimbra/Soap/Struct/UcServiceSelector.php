<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Soap\Struct;

use Zimbra\Soap\Enum\UcServiceBy;
use Zimbra\Utils\SimpleXML;

/**
 * UcServiceSelector class
 * @package   Zimbra
 * @category  Soap
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class UcServiceSelector
{
    /**
     * Select the meaning of {acct-selector-key}
     * Valid values: id|name
     * - use : required
     * @var string
     */
    private $_by;

    /**
     * Specifies the account to authenticate against
     * @var string
     */
    private $_value;

    /**
     * Constructor method for UcServiceSelector
     * @param  string $by
     * @param  string $value
     * @return self
     */
    public function __construct($by, $value = null)
    {
        if(UcServiceBy::isValid(trim($by)))
        {
            $this->_by = trim($by);
        }
        else
        {
            throw new \InvalidArgumentException('Invalid uc service by');
        }
        $this->_value = trim($value);
    }

    /**
     * Gets or sets by
     *
     * @param  string $by
     * @return string|self
     */
    public function by($by = null)
    {
        if(null === $by)
        {
            return $this->_by;
        }
        if(UcServiceBy::isValid(trim($by)))
        {
            $this->_by = trim($by);
        }
        else
        {
            throw new \InvalidArgumentException('Invalid uc service by');
        }
        return $this;
    }

    /**
     * Gets or sets value
     *
     * @param  string $value
     * @return string|self
     */
    public function value($value = null)
    {
        if(null === $value)
        {
            return $this->_value;
        }
        $this->_value = trim($value);
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @param  string $name
     * @return array
     */
    public function toArray($name = 'ucservice')
    {
        $name = !empty($name) ? $name : 'ucservice';
        return array($name => array(
            'by' => $this->_by,
            '_' => $this->_value,
        ));
    }

    /**
     * Method returning the xml representation of this class
     *
     * @param  string $name
     * @return SimpleXML
     */
    public function toXml($name = 'ucservice')
    {
        $name = !empty($name) ? $name : 'ucservice';
        $xml = new SimpleXML('<'.$name.'>'.$this->_value.'</'.$name.'>');
        $xml->addAttribute('by', $this->_by);
        return $xml;
    }

    /**
     * Method returning the xml string representation of this class
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toXml()->asXml();
    }
}
