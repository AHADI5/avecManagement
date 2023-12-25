<?php
include("../../configurations/config.php");
include("../../models/Social.php");

$socialMember = Social::getSocialByIdMembre($idMembre);
