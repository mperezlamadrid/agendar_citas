<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="<?=base_url()?>favicon.png" type="image/gif">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap-theme.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/my_styles.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/simple-sidebar.css'); ?>">
  </head>
  <body>
    <style>
      body, html{
        margin: 0px;
        padding: 0px;
      }

      header{
        background: #4BA6DC;
        text-align: center;
        padding: 20px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1;
        padding-left: 270px;
      }

      header h1{
        margin: 0px;
        color: #fff;
        font-size: 26px;
      }
    </style>
    <header>
      <h1><?php echo $title; ?></h1>
    </header>

    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="<?=base_url('home/index')?>"> INICIO </a>
        </li>
        <li class="title">Panel Administrativo</li>
        <li> <a href="<?=base_url('pacientes/index')?>">Pacientes</a> </li>
        <li> <a href="<?=base_url('doctores/index')?>">Medicos</a> </li>
        <li> <a href="<?=base_url('citas/index')?>">Citas</a> </li>
        <span>
          © 2015 Citas Manuel Perez - Jerson Orozco
        </span>
      </ul>
    </div>

    <div id="page-content-wrapper">
        <div class="container-fluid">
