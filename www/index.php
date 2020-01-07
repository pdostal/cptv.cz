<?php
  function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  $randID = generateRandomString(12);
  $actual_url = $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://'.$_SERVER[HTTP_X_FORWARDED_HOST].':'.$_SERVER['HTTP_X_FORWARDED_PORT'].$_SERVER[REQUEST_URI];
?>
<!doctype html>
<html>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    <title>CPTV</title>
    <script><?php include('jquery.min.js'); ?></script>
    <style type="text/css">
      h1 { margin: 0px; }
      body { width: 400px; }
      header { padding-bottom: 25px; }
      footer { padding-top: 25px; }
      #headermotto { font-weight: bold; font-style: italic; }
      a,a:hover { color: #000; text-decoration: none; }
      body:only-child { text-overflow: ellipsis; white-space: nowrap; }
    </style>
    <script>
      // JavaScript
      window.onload = function(){
        document.getElementById('javascriptCheck').innerHTML = "True";
      };

      $(function () {

        // jQuery
        $('#jqueryCheck').html('True');

        // Preferred Protocol
        $.get( "preferredprotocol.php?rand=<?php echo $randID; ?>", function( data ) {
          $('#preferredProtocol').html(data);
        });

        // HTTP Check | Code
        $.ajax({ url: "http://http.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/serverhttp.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#serverHttpCheck').html(data); },
          complete: function(xhr, textStatus) { $('#serverHttpCode').html(xhr.status); }
        });

        // HTTPS Check | Code
        $.ajax({ url: "https://https.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/serverhttps.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#serverHttpsCheck').html(data); },
          complete: function(xhr, textStatus) { $('#serverHttpsCode').html(xhr.status); }
        });

        // IPv4 Remote Addr
        $.ajax({ url: "http://ipv4.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteaddr.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteAddrV4').html(data); }
        });

        // IPv4 Remote Host
        $.ajax({ url: "http://ipv4.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remotehost.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteHostV4').html(data); }
        });

        // IPv6 Remote Addr
        $.ajax({ url: "http://ipv6.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteaddr.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteAddrV6').html(data); }
        });

        // IPv6 Remote Host
        $.ajax({ url: "http://ipv6.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remotehost.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteHostV6').html(data); }
        });

        // IPv4 Remote Origin
        $.ajax({ url: "http://ipv4.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteorigin.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteOriginV4').html(data); }
        });

        // IPv4 Remote Origin HE
        $.ajax({ url: "http://ipv4.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteorigin.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteOriginHEV4').attr("href", "https://bgp.he.net/"+data); }
        });

        // IPv4 Remote netname
        $.ajax({ url: "http://ipv4.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remotenet.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteNetV4').html(data); }
        });

        // IPv4 Remote Route
        $.ajax({ url: "http://ipv4.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteroute.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteRouteV4').html(data); }
        });

        // IPv4 Remote Organisation
        $.ajax({ url: "http://ipv4.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteorg.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteOrgV4').html(data); }
        });

        // IPv6 Remote Origin
        $.ajax({ url: "http://ipv6.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteorigin.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteOriginV6').html(data); }
        });

        // IPv6 Remote Origin HE
        $.ajax({ url: "http://ipv6.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteorigin.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteOriginHEV6').attr("href", "https://bgp.he.net/"+data); }
        });

        // IPv6 Remote netname
        $.ajax({ url: "http://ipv6.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remotenet.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteNetV6').html(data); }
        });

        // IPv6 Remote Route
        $.ajax({ url: "http://ipv6.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteroute.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteRouteV6').html(data); }
        });

        // IPv6 Remote Organisation
        $.ajax({ url: "http://ipv6.<?php echo $_SERVER[HTTP_X_FORWARDED_HOST]; ?>/remoteorg.php?rand=<?php echo $randID; ?>", cache: false,
          success: function(data, textStatus, xhr) { $('#remoteOrgV6').html(data); }
        });

        // Agent
        $.get( "useragent.php?rand=<?php echo $randID; ?>", function( data ) {
          $('#userAgent').html(data);
        });

        // DNSSEC
        $('#dnssecpixel').attr('src','http://www.dnssec-failed.org/1x1.gif');

        setTimeout(function() {
          $('#dnssectext').html("True");
          $('#dnssecpixel').on('load', function(){
            $('#dnssectext').html("False");
          });
        }, 500);
      });
    </script>
  </head>
  <body>
    <header>
      <h1>CaPTiVe</h1>
      <span id="headermotto">Everything you need to know about your connection!</span>
    </header>

    <main>
      <i>HTTP</i>: <b id="serverHttpCheck">False</b> (<b id="serverHttpCode"> </b>)
      <i>HTTPS</i>: <b id="serverHttpsCheck">False</b> (<b id="serverHttpsCode"> </b>)<br />
      <i>JavaScript</i>: <b id="javascriptCheck">False</b> <i>jQuery</i>: <b id="jqueryCheck">False</b><br />
      <hr />
      <i>In</i>: <b><?php echo $actual_url; ?></b><br />
      <i>From</i>: <b><?php echo $_SERVER['HTTP_REFERER']; ?></b><br />
      <hr />
      <i>Preferred protocol</i>: <b id="preferredProtocol"><?php include('preferredprotocol.php'); ?></b>
      <i>DNSSEC</i>: <b id="dnssectext">-</b><br />
      <hr />
      <i>Remote v4</i>: <b id="remoteAddrV4">Is probably not supported</b> (<b id="remoteHostV4"></b>)<br />
      <i>Remote v6</i>: <b id="remoteAddrV6">Is probably not supported</b> (<b id="remoteHostV6"></b>)<br />
      <hr />
      <i>Remote v4</i>: <a id="remoteOriginHEV4"><b id="remoteOriginV4"></b></a> - <span id="remoteNetV4"></span>: <i id="remoteRouteV4"></i> @ <span id="remoteOrgV4"></span>)<br />
      <i>Remote v6</i>: <a id="remoteOriginHEV6"><b id="remoteOriginV6"></b></a> - <span id="remoteNetV6"></span>: <i id="remoteRouteV6"></i> @ <span id="remoteOrgV6"></span>)<br />
      <hr />
      <i>Agent</i>: <b id="userAgent"><?php include('useragent.php'); ?></b><br />
    </main>

    <footer>
      <p>&copy; <b>Pavel Dostál</b>
      (<a href="mailto:pdostal@pdostal.cz">pdostal@pdostal.cz</a>)
      &lt;<a itemprop="url" href="http://pdostal.cz/">https://pdostal.cz/</a>&gt;</p>
    </footer>

    <img id="dnssecpixel" src="" width="1" height="1" />
  </body>
</html>
