<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\API\Admin\Request;

use Zimbra\Soap\Request;

/**
 * ComputeAggregateQuotaUsage class
 * Computes the aggregate quota usage for all domains in the system.
 *
 * @package   Zimbra
 * @category  API
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class ComputeAggregateQuotaUsage extends Request
{
    /**
     * Constructor method for ComputeAggregateQuotaUsage
     *
     * @return self
     */
    public function __construct()
    {
        parent::__construct();
    }
}
