<?php

namespace Concrete\Package\Phpcodeblock\Controller\SinglePage\Dashboard\System\Basics;

defined('C5_EXECUTE') or die(_('Access Denied.'));

use Concrete\Core\Page\Controller\DashboardPageController;
use Package;

class Phpcodeblock extends DashboardPageController
{
    public function view()
    {
        $pkg = Package::getByHandle('phpcodeblock');
        $this->set('active', $pkg->isActivated());
        $this->set('interpreted', $pkg->isInterpreted());
        $this->set('themeace', $pkg->getThemeAce());
    }

    public function success()
    {
        $this->set('success', t('Configuration updated'));
        $this->view();
    }

    public function save_global_settings()
    {
        $pkg = Package::getByHandle('phpcodeblock');
        $pkg->setActivated($this->post('activate'));
        $pkg->setInterpreted($this->post('interpret'));
        $pkg->setThemeAce($this->post('themeace'));
        $this->redirect('/dashboard/system/basics/Phpcodeblock/success');
    }
}
