<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies to the controllers
 * Each time it is used in a method the object should be instantiated
 *
 * @author yoann
 */
namespace service\Admin;

require '../FilterService.php';
require '../UrlService.php';
require '../UserService.php';
require '../ValidatorService.php';
require '/../model/repository/MembreRepository.php';

use \repository\MembreRepository as MembreRepository;
use \service\UserService AS UserService;
use \service\FilterService AS FilterService;
use \service\ValidatorService AS ValidatorService;
use \service\UrlService AS UrlService;

class AdminService extends UserService
{
    public function addSalle()
    {
        
    }
    
    public function editSalle()
    {
        
    }
    
    public function deleteSalle()
    {
        
    }
}