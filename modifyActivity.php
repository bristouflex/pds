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
                    <h3 class="box-title">Modifier une activité</h3>
                    <div class="row">
                    <ul class="list-inline">
                    <button type="button" class="btn" onclick="tb_Bapteme()">Bapteme</button>
                    <button type="button" class="btn" onclick="tb_Cotisation()">Cotisation</button>
                    <button type="button" class="btn" onclick="tb_Lecon()">Lecon</button>
                    <button type="button" class="btn" onclick="tb_LocationULM()">LocationULM</button>
                    <button type="button" class="btn" onclick="tb_Parachute()">Parachute</button>
                    </ul>
                    </div>
                    <div class="row">
                    <div id="options_b"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
