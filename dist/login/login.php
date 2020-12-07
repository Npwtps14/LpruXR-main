<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LpruX</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/neumorphic-login.css">
</head>

<body>

    <div class="columns is-mobile is-centered">
        <div class="column is-half">
            <p class="bd-notification is-primary">
                <hr>
                <hr>
                <center>
                    <div class="login">
                        <img src="https://firebasestorage.googleapis.com/v0/b/lpru-63421.appspot.com/o/unnamed.png?alt=media&token=3de8c276-632b-4180-9cb5-62b2964fdf44" width="150px" />
                        <form action="checklogin.php" method="POST" class="column is-half">
                            <div class="field">
                                <div class="control">
                                    <input  id="Username" required name="Username" class="input is-medium is-rounded" type="text" placeholder="Username" autocomplete="username" required />
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input id="Password"required name="Password" class="input is-medium is-rounded" type="password" placeholder="Password" autocomplete="current-password" required />
                                </div>
                            </div>
                            <br />
                            <nav class="level">
                                <div class="level-item has-text-centered">
                                    <div>
                                        <div class="column">
                                            <button class="button is-block is-fullwidth is-primary is-medium is-rounded " type="submit">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="level-item has-text-centered">
                                <div class="column">
                                            <button class="button is-block is-fullwidth is-primary is-medium is-rounded " type="reset">
                                                Reset
                                            </button>
                                        </div>
                                </div>
                            </nav>



                        </form>
                        <br>
                        <nav class="level">
                            <div class="level-item has-text-centered">
                                <div>
                                    <a href="../../">กลับหน้าหลัก</a>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">

                            </div>
                        </nav>
                    </div>
                </center>
            </p>
        </div>
    </div>
</body>

</html>