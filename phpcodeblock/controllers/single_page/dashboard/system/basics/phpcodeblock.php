<?php      
namespace Concrete\Package\Phpcodeblock\Controller\SinglePage\Dashboard\System\Basics;

defined('C5_EXECUTE') or die(_("Access Denied."));

use Package;
use \Concrete\Core\Page\Controller\DashboardPageController;
use Log;

class Phpcodeblock extends DashboardPageController 
{
        function view()
        {
            $pkg = Package::getByHandle('phpcodeblock');
            $this->set( 'active', $pkg->isActivated() );
            $this->set( 'interpreted', $pkg->isInterpreted() );
			$this->set( 'themeace', $pkg->getThemeAce());
        }

        function success()
        {
            $this->set('success', t('Configuration updated') );
            $this->view();
        }

        function save_global_settings()
        {
            $pkg = Package::getByHandle('phpcodeblock');
            $pkg->setActivated($this->post('activate'));
            $pkg->setInterpreted( $this->post('interpret'));
			$pkg->setThemeAce($this->post( 'themeace'));
            $this->redirect('/dashboard/system/basics/Phpcodeblock/success');
        }
}
