<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\API\Account\Request;

use Zimbra\Soap\Request;
use Zimbra\Soap\Struct\Attr;
use Zimbra\Soap\Struct\DistributionListSelector as DistList;

/**
 * GetDistributionList class
 * Get a distribution list, optionally with ownership information an granted rights. 
 *
 * @package   Zimbra
 * @category  API
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class GetDistributionList extends Request
{
    /**
     * The dl
     * @var DistList
     */
    private $_dl;

    /**
     * Whether to return owners, default is 0 (i.e. Don't return owners)
     * @var boolean
     */
    private $_needOwners;

    /**
     * Return grants for the specified (comma-seperated) rights.
     * e.g. needRights="sendToDistributionList,viewDistributionList"
     * @var string
     */
    private $_needRights;

    /**
     * The attribute
     * @var array of Attr
     */
    private $_attrs = array();

    /**
     * Constructor method for getDistributionList
     * @param  DistList $dl
     * @param  bool     $needOwners
     * @param  string   $needRights
     * @param  array    $attrs
     * @return self
     */
    public function __construct(
        DistList $dl,
        $needOwners = null,
        $needRights = null,
        array $attrs = array())
    {
        parent::__construct();
        $this->_dl = $dl;
        if(null !== $needOwners)
        {
            $this->_needOwners = (bool) $needOwners;
        }
        $this->_needRights = trim($needRights);
        $this->attrs($attrs);
    }

    /**
     * Gets or sets dl
     *
     * @param  DistList $dl
     * @return DistList|self
     */
    public function dl(DistList $dl = null)
    {
        if(null === $dl)
        {
            return $this->_dl;
        }
        $this->_dl = $dl;
        return $this;
    }

    /**
     * Gets or sets needOwners
     *
     * @param  bool $ownerOf
     * @return bool|self
     */
    public function needOwners($needOwners = null)
    {
        if(null === $needOwners)
        {
            return $this->_needOwners;
        }
        $this->_needOwners = (bool) $needOwners;
        return $this;
    }

    /**
     * Gets or sets needRights
     *
     * @param  string $needRights
     * @return string|self
     */
    public function needRights($needRights = null)
    {
        if(null === $needRights)
        {
            return $this->_needRights;
        }
        $this->_needRights = trim($needRights);
        return $this;
    }

    /**
     * Add an attr
     *
     * @param  Attr $attr
     * @return GetDistributionList
     */
    public function addAttr(Attr $attr)
    {
        $this->_attrs[] = $attr;
        return $this;
    }

    /**
     * Gets or sets attrs
     *
     * @param  array $attrs
     * @return array|self
     */
    public function attrs(array $attrs = null)
    {
        if(null === $attrs)
        {
            return $this->_attrs;
        }
        $this->_attrs = array();
        foreach ($attrs as $attr)
        {
            if($attr instanceof Attr)
            {
                $this->_attrs[] = $attr;
            }
        }
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @return array
     */
    public function toArray()
    {
        $this->array += $this->_dl->toArray();
        if(is_bool($this->_needOwners))
        {
            $this->array['needOwners'] = $this->_needOwners ? 1 : 0;
        }
        if(!empty($this->_needRights))
        {
            $this->array['needRights'] = (string) $this->_needRights;
        }
        if(count($this->_attrs))
        {
            $this->array['a'] = array();
            foreach ($this->_attrs as $attr)
            {
                $attrArr = $attr->toArray('a');
                $this->array['a'][] = $attrArr['a'];
            }
        }
        return parent::toArray();
    }

    /**
     * Method returning the xml representation of this class
     *
     * @return SimpleXML
     */
    public function toXml()
    {
        $this->xml->append($this->_dl->toXml());
        if(is_bool($this->_needOwners))
        {
            $this->xml->addAttribute('needOwners', $this->_needOwners ? 1 : 0);
        }
        if(!empty($this->_needRights))
        {
            $this->xml->addAttribute('needRights', $this->_needRights);
        }
        if(count($this->_attrs))
        {
            foreach ($this->_attrs as $attr)
            {
                $this->xml->append($attr->toXml('a'));
            }
        }
        return parent::toXml();
    }
}
