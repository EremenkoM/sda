/*!
Pure v0.3.0
Copyright 2013 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
https://github.com/yui/pure/blob/master/LICENSE.md
*/
.pure-menu ul{position:absolute;visibility:hidden}
.pure-menu.pure-menu-open{visibility:visible;z-index:2;width:100%}
.pure-menu ul{left:-10000px;list-style:none;margin:0;padding:0;top:-10000px;z-index:1}
.pure-menu>ul{position:relative}
.pure-menu-open>ul{left:0;top:0;visibility:visible}
.pure-menu-open>ul:focus{outline:0}.pure-menu li{position:relative}
.pure-menu a,.pure-menu 
.pure-menu-heading{display:block;color:inherit;line-height:1.5em;padding:5px 20px;text-decoration:none;white-space:nowrap}
.pure-menu.pure-menu-horizontal>
.pure-menu-heading{display:inline-block;*display:inline;zoom:1;margin:0;vertical-align:middle}
.pure-menu.pure-menu-horizontal>ul{display:inline-block;*display:inline;zoom:1;vertical-align:middle;height:2.4em}
.pure-menu li a{padding:5px 20px}
.pure-menu-can-have-children>
.pure-menu-label:after{content:'\25B8';float:right;font-family:'Lucida Grande','Lucida Sans Unicode','DejaVu Sans',sans-serif;margin-right:-20px;margin-top:-1px}
.pure-menu-can-have-children>
.pure-menu-label{padding-right:30px}
.pure-menu-separator{background-color:#dfdfdf;display:block;height:1px;font-size:0;margin:7px 2px;overflow:hidden}
.pure-menu-hidden{display:none}.pure-menu-fixed{position:fixed;top:0;left:0;width:100%}
.pure-menu-horizontal li{display:inline-block;*display:inline;zoom:1;vertical-align:middle}
.pure-menu-horizontal li li{display:block}
.pure-menu-horizontal>
.pure-menu-children>
.pure-menu-can-have-children>
.pure-menu-label:after{content:"\25BE"}
.pure-menu-horizontal>.pure-menu-children>
.pure-menu-can-have-children>
.pure-menu-label{padding-right:30px}
.pure-menu-horizontal li
.pure-menu-separator{height:50%;width:1px;margin:0 7px}
.pure-menu-horizontal li li
.pure-menu-separator{height:1px;width:auto;margin:7px 2px}
.pure-menu.pure-menu-open,
.pure-menu.pure-menu-horizontal li 
.pure-menu-children{background:#fff;border:1px solid #b7b7b7}
.pure-menu.pure-menu-horizontal,
.pure-menu.pure-menu-horizontal 
.pure-menu-heading{border:0}
.pure-menu a{border:1px solid transparent;border-left:0;border-right:0}
.pure-menu a,.pure-menu 
.pure-menu-can-have-children>li:after{color:#777}
.pure-menu .pure-menu-can-have-children>li:hover:after{color:#fff}
.pure-menu .pure-menu-open{background:#dedede}
.pure-menu li a:hover,
.pure-menu li a:focus{background:#eee}
.pure-menu li.pure-menu-disabled a:hover,
.pure-menu li.pure-menu-disabled a:focus{background:#fff;color:#bfbfbf}
.pure-menu .pure-menu-disabled>a{background-image:none;border-color:transparent;cursor:default}
.pure-menu .pure-menu-disabled>a,
.pure-menu .pure-menu-can-have-children
.pure-menu-disabled>a:after{color:#bfbfbf}
.pure-menu 
.pure-menu-heading{color:#565d64;text-transform:uppercase;font-size:90%;margin-top:.5em;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#dfdfdf}
.pure-menu 
.pure-menu-selected a{color:#000}
.pure-menu
.pure-menu-open
.pure-menu-fixed{border:0;border-bottom:1px solid #b7b7b7}
.pure-paginator{letter-spacing:-.31em;*letter-spacing:normal;*word-spacing:-.43em;text-rendering:optimizespeed;list-style:none;margin:0;padding:0}.opera-only :-o-prefocus,
.pure-paginator{word-spacing:-.43em}
.pure-paginator li{display:inline-block;*display:inline;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}
.pure-paginator 
.pure-button{border-radius:0;padding:.8em 1.4em;vertical-align:top;height:1.1em}
.pure-paginator 
.pure-button:focus,
.pure-paginator 
.pure-button:active{outline-style:none}
.pure-paginator .prev,
.pure-paginator .next{color:#C0C1C3;text-shadow:0 -1px 0 rgba(0,0,0,.45)}
.pure-paginator .prev{border-radius:2px 0 0 2px}
.pure-paginator .next{border-radius:0 2px 2px 0}@media (max-width:480px)
{.pure-menu-horizontal{width:100%}.pure-menu-children li{display:block;border-bottom:1px solid #000}}