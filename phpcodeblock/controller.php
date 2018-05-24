<?php      
namespace Concrete\Package\Phpcodeblock;

defined('C5_EXECUTE') or die("Access Denied.");

use Package;
use BlockType;
use Loader;
use SinglePage;
use Page;
use \Concrete\Core\Page\Controller\DashboardPageController;

class Controller extends Package {

	protected $pkgHandle = 'phpcodeblock';
	protected $appVersionRequired = '5.7.0.4';
	protected $pkgVersion = '1.0.1';
	
	public function getPackageDescription() {
		return t("Provides a HTML+PHP script block.");
	}
	
	public function getPackageName() {
		return t("HTML+PHP Code Block");
	}
	
	public function isActivated() { return $this->getConfig()->get('lobar.global_activate') == 1 ?true:false; }
	public function setActivated($activated=true) { $this->getConfig()->save('lobar.global_activate',$activated?1:0);}
	public function isInterpreted() { return $this->getConfig()->get('lobar.global_interpret') == 1 ?true:false; }
	public function setInterpreted($interpreted=true) { $this->getConfig()->save('lobar.global_interpret',$interpreted?1:0);}
	public function getThemeAce() { return $this->getConfig()->get('lobar.global_themeace'); }
	public function setThemeAce($themeace='chrome') { $this->getConfig()->save('lobar.global_themeace', $themeace);}
	
	public function install() {
		$pkg = parent::install();
		
		//install block		
		BlockType::installBlockTypeFromPackage('phpcodeblock', $pkg);
		
		//init
		$this->setActivated();
		$this->setInterpreted();
		$this->setThemeAce('chrome');
		
		$single_page = SinglePage::add('/dashboard/system/basics/phpcodeblock', $pkg);
		$single_page->update(array('cName' => t('Php Code Block Settings'), 'cDescription' => t('Global settings for phpcodeblock')));
	}
}