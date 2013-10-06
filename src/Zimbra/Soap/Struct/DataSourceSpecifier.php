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

use Zimbra\Soap\Enum\DataSourceType;
use Zimbra\Utils\SimpleXML;

/**
 * DataSourceSpecifier class
 * @package   Zimbra
 * @category  Soap
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class DataSourceSpecifier extends AttrsImpl
{
    /**
     * The type
     * - use : required
     * @var DataSourceType
     */
    private $type;

    /**
     * The name
     * - use : required
     * @var string
     */
    private $name;

    /**
     * Constructor method for DataSourceSpecifier
     * @param DataSourceType $type
     * @param string $name
     * @return self
     */
    public function __construct($type, $name, array $attrs = array())
    {
        parent::__construct($attrs);
        if(DataSourceType::isValid(trim($type)))
        {
            $this->_type = trim($type);
        }
        else
        {
            throw new \InvalidArgumentException('Invalid data source type');
        }
        $this->_name = trim($name);
    }

    /**
     * Gets or sets type
     *
     * @param  string $type
     * @return string|self
     */
    public function type($type = null)
    {
        if(null === $type)
        {
            return $this->_type;
        }
        if(DataSourceType::isValid(trim($type)))
        {
            $this->_type = trim($type);
        }
        else
        {
            throw new \InvalidArgumentException('Invalid data source type');
        }
        return $this;
    }

    /**
     * Gets or sets name
     *
     * @param  string $name
     * @return string|self
     */
    public function name($name = null)
    {
        if(null === $name)
        {
            return $this->_name;
        }
        $this->_name = trim($name);
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @return array
     */
    public function toArray()
    {
        $this->array = array(
            'type' => $this->_type,
            'name' => $this->_name,
        );
        return array('dataSource' => parent::toArray());
    }

    /**
     * Method returning the xml representation of this class
     *
     * @return SimpleXML
     */
    public function toXml()
    {
        $xml = new SimpleXML('<dataSource />');
        $xml->addAttribute('type', $this->_type)
            ->addAttribute('name', $this->_name);
        parent::appendAttrs($xml);
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
