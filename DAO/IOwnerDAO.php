<?php
namespace DAO;

use Models\Owner as Owner;
use Models\Pet as Pet;

interface IOwnerDAO{
    function Add(Owner $newOwner);
    function AddPet(Pet $newPet);
    function Delete($id);
    function GetAll();
    function getByEmail($email);
    function GetById($id);
}
?>