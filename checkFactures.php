<?php
require "init.php";

if(!backisConnected()){
    session_destroy();
    header("location: index.php");
}

?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Back-office AEN</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Voir les factures</h3>
                    <div class="row">
                        <ul class="list-inline">
                            <li><button type="button" class="btn" onclick="t_all()">Voir toutes les factures</button></li>
                            <li><button type="button" class="btn" onclick="t_paid()">Voir les factures payées</button></li>
                            <li><button type="button" class="btn" onclick="t_notpaid()">Voir les factures non payées</button></li>
                            </ul>
                    </div>
                    <div class="row">
                        <div id="options_b"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




<div id="content"></div>