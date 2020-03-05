<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
    <title>SAV</title>

    <style>
        /*-------------------*/
        /*  Sticky footer   */
        /*-----------------*/
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 60px;
            /* Margin bottom by footer height */
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            /* Set the fixed height of the footer here */
            line-height: 60px;
            /* Vertically center the text there */
        }

        /*----------------------*/
        /*  end sticky footer  */
        /*--------------------*/
    </style>
</head>

<body>

    <!-------------------------------------------->
    <!--------------    header     --------------->
    <!-------------------------------------------->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo site_url("") ?>">Service Aprés Vente</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url("") ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url("/client/index") ?>">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url("/produit/index") ?>">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url("/commande/index") ?>">Commandes</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <?php if($this->session->userdata('logged_in')) : ?>
                    <a href="<?php echo site_url("/user/logout") ?>"><button class="btn btn-danger my-2 my-sm-0" type="button">Logout</button></a>
                <?php endif;  ?>
            </form>

        </div>
    </nav>
    <!-------------------------------------------->
    <!--------------   fin header   -------------->
    <!-------------------------------------------->
    <!-------------------------------------------->
    <!-------------  Flash messages  ------------->
    <!-------------------------------------------->
    <?php if ($this->session->flashdata('user_registered')) : ?>
        <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('login_failed')) : ?>
        <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedin')) : ?>
        <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedout')) : ?>
        <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('access_denied')) : ?>
        <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('access_denied') . '</p>'; ?>
    <?php endif; ?>

    <!-------------------------------------------->
    <!----------- fin flash messages  ------------>
    <!-------------------------------------------->
    


    <h1 style="text-align: center;"><?php echo $title; ?></h1>