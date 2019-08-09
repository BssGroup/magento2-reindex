<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category   BSS
 * @package    Bss_Core
 * @author     Extension Team
 * @copyright  Copyright (c) 2017-2018 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */

namespace Bss\Reindex\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Data
 * @package Bss\Core\Helper
 */
class Data extends AbstractHelper
{
    const BSS_CORE_MODULE_NAME = 'Bss_Core';

    /**
     * @var \Magento\Framework\Module\Manager
     */
    private $moduleManager;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\Module\Manager $moduleManager
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Module\Manager $moduleManager
    )
    {
        parent::__construct($context);
        $this->moduleManager = $moduleManager;
    }

    /**
     * @return bool
     */
    public function isCoreModuleEnabled()
    {
        return $this->moduleManager->isEnabled(self::BSS_CORE_MODULE_NAME);
    }

    /**
     * @return string
     */
    public function getModuleName()
    {
        return $this->_getModuleName();
    }
}
