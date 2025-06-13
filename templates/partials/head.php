<!DOCTYPE html>
<html ng-app="federico">
<head>  <meta name=viewport content="width=device-width, initial-scale=1">  <title><?php echo $title; ?></title>  <link rel="shortcut icon" href="/img/icons/favicon.ico" type="image/x-icon" />  <meta name="name" content="Federico Consulting">  <meta name="description" content="<?php echo $description ?>">  <meta name="keywords" content="network health,telecom,it solutions,it support,network solutions,avaya,phone systems,server setup,network setup,small office server setup,hp support,managed services">  <link rel="stylesheet" href="css/materialize.min.css">  <?php include_once("analyticstracking.php"); ?>  <script type="application/ld+json">    {      "@context": "http://schema.org",      "@type": "Organization",      "url": "https://federico.net/",      "contactPoint": [{        "@type": "ContactPoint",        "telephone": "+1-559-224-5922",        "areaServed": "Fresno, California"        "email": "sales@federico.net",        "contactType": "Customer Service"      }]    }  </script></head><style media="screen">  html, body {    -webkit-animation: fadein 1.5s; /* Safari, Chrome and Opera > 12.1 */       -moz-animation: fadein 1.5s; /* Firefox < 16 */        -ms-animation: fadein 1.5s; /* Internet Explorer */         -o-animation: fadein 1.5s; /* Opera < 12.1 */            animation: fadein 1.5s;  }  @keyframes fadein {    from { opacity: 0; }    to   { opacity: 1; }  }  /* Firefox < 16 */  @-moz-keyframes fadein {    from { opacity: 0; }    to   { opacity: 1; }  }  /* Safari, Chrome and Opera > 12.1 */  @-webkit-keyframes fadein {    from { opacity: 0; }    to   { opacity: 1; }  }  /* Internet Explorer */  @-ms-keyframes fadein {    from { opacity: 0; }    to   { opacity: 1; }  }  /* Opera < 12.1 */  @-o-keyframes fadein {    from { opacity: 0; }    to   { opacity: 1; }  }</style><body ng-controller="mainCtrl" ng-cloak>
  <script>
      (function(w){
    "use strict";
    var loadCSS = function( href, before, media ){
      var doc = w.document;
      var ss = doc.createElement( "link" );
      var ref;
      if( before ){
        ref = before;
      }
      else {
        var refs = ( doc.body || doc.getElementsByTagName( "head" )[ 0 ] ).childNodes;
        ref = refs[ refs.length - 1];
      }

      var sheets = doc.styleSheets;
      ss.rel = "stylesheet";
      ss.href = href;
      ss.media = "only x";


      function ready( cb ){
        if( doc.body ){
          return cb();
        }
        setTimeout(function(){
          ready( cb );
        });
      }

      ready( function(){
        ref.parentNode.insertBefore( ss, ( before ? ref : ref.nextSibling ) );
      });

      var onloadcssdefined = function( cb ){
        var resolvedHref = ss.href;
        var i = sheets.length;
        while( i-- ){
          if( sheets[ i ].href === resolvedHref ){
            return cb();
          }
        }
        setTimeout(function() {
          onloadcssdefined( cb );
        });
      };

      function loadCB(){
        if( ss.addEventListener ){
          ss.removeEventListener( "load", loadCB );
        }
        ss.media = media || "all";
      }


      if( ss.addEventListener ){
        ss.addEventListener( "load", loadCB);
      }
      ss.onloadcssdefined = onloadcssdefined;
      onloadcssdefined( loadCB );
      return ss;
    };
    if( typeof exports !== "undefined" ){
      exports.loadCSS = loadCSS;
    }
    else {
      w.loadCSS = loadCSS;
    }
    }( typeof global !== "undefined" ? global : this ));
  </script>
  <script type="text/javascript">
      loadCSS('https://fonts.googleapis.com/icon?family=Material+Icons');
      loadCSS('https://fonts.googleapis.com/css?family=Share+Tech|Jura:400,600');
      loadCSS('css/style.css');
  </script>

  <?php include_once("templates/partials/navbar.php"); ?>
