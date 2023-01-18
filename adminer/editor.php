<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.7.9
*/function
adminer_errors($bc,$cc){return!!preg_match('~^(Trying to access array offset on value of type null|Undefined array key)~',$cc);}error_reporting(6135);set_error_handler('adminer_errors',2);$vc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($vc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Og=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Og)$$X=$Og;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($t){$Gd=substr($t,-1);return
str_replace($Gd.$Gd,$Gd,substr($t,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Ye,$vc=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($x,$X)=each($Ye)){foreach($X
as$xd=>$W){unset($Ye[$x][$xd]);if(is_array($W)){$Ye[$x][stripslashes($xd)]=$W;$Ye[]=&$Ye[$x][stripslashes($xd)];}else$Ye[$x][stripslashes($xd)]=($vc?$W:stripslashes($W));}}}}function
bracket_escape($t,$Ia=false){static$_g=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($t,($Ia?array_flip($_g):$_g));}function
min_version($bh,$Sd="",$i=null){global$h;if(!$i)$i=$h;$Hf=$i->server_info;if($Sd&&preg_match('~([\d.]+)-MariaDB~',$Hf,$_)){$Hf=$_[1];$bh=$Sd;}return(version_compare($Hf,$bh)>=0);}function
charset($h){return(min_version("5.5.3",0,$h)?"utf8mb4":"utf8");}function
script($Qf,$zg="\n"){return"<script".nonce().">$Qf</script>$zg";}function
script_src($Tg){return"<script src='".h($Tg)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($A,$Y,$Xa,$Cd="",$ue="",$bb="",$Dd=""){$I="<input type='checkbox' name='$A' value='".h($Y)."'".($Xa?" checked":"").($Dd?" aria-labelledby='$Dd'":"").">".($ue?script("qsl('input').onclick = function () { $ue };",""):"");return($Cd!=""||$bb?"<label".($bb?" class='$bb'":"").">$I".h($Cd)."</label>":$I);}function
optionlist($B,$Bf=null,$Xg=false){$I="";foreach($B
as$xd=>$W){$ze=array($xd=>$W);if(is_array($W)){$I.='<optgroup label="'.h($xd).'">';$ze=$W;}foreach($ze
as$x=>$X)$I.='<option'.($Xg||is_string($x)?' value="'.h($x).'"':'').(($Xg||is_string($x)?(string)$x:$X)===$Bf?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($A,$B,$Y="",$te=true,$Dd=""){if($te)return"<select name='".h($A)."'".($Dd?" aria-labelledby='$Dd'":"").">".optionlist($B,$Y)."</select>".(is_string($te)?script("qsl('select').onchange = function () { $te };",""):"");$I="";foreach($B
as$x=>$X)$I.="<label><input type='radio' name='".h($A)."' value='".h($x)."'".($x==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Da,$B,$Y="",$te="",$Pe=""){$ig=($B?"select":"input");return"<$ig$Da".($B?"><option value=''>$Pe".optionlist($B,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Pe'>").($te?script("qsl('$ig').onchange = $te;",""):"");}function
confirm($ae="",$Cf="qsl('input')"){return
script("$Cf.onclick = function () { return confirm('".($ae?js_escape($ae):lang(0))."'); };","");}function
print_fieldset($s,$Id,$eh=false){echo"<fieldset><legend>","<a href='#fieldset-$s'>$Id</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$s');",""),"</legend>","<div id='fieldset-$s'".($eh?"":" class='hidden'").">\n";}function
bold($Qa,$bb=""){return($Qa?" class='active $bb'":($bb?" class='$bb'":""));}function
odd($I=' class="odd"'){static$r=0;if(!$I)$r=-1;return($r++%2?$I:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($x,$X=null){static$wc=true;if($wc)echo"{";if($x!=""){echo($wc?"":",")."\n\t\"".addcslashes($x,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$wc=false;}else{echo"\n}\n";$wc=true;}}function
ini_bool($nd){$X=ini_get($nd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($ah,$N,$V,$E){$_SESSION["pwds"][$ah][$N][$V]=($_COOKIE["adminer_key"]&&is_string($E)?array(encrypt_string($E,$_COOKIE["adminer_key"])):$E);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($Q){global$h;return$h->quote($Q);}function
get_vals($F,$e=0){global$h;$I=array();$H=$h->query($F);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$e];}return$I;}function
get_key_vals($F,$i=null,$Kf=true){global$h;if(!is_object($i))$i=$h;$I=array();$H=$i->query($F);if(is_object($H)){while($J=$H->fetch_row()){if($Kf)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($F,$i=null,$o="<p class='error'>"){global$h;$mb=(is_object($i)?$i:$h);$I=array();$H=$mb->query($F);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($i)&&$o&&defined("PAGE_HEADER"))echo$o.error()."\n";return$I;}function
unique_array($J,$v){foreach($v
as$u){if(preg_match("~PRIMARY|UNIQUE~",$u["type"])){$I=array();foreach($u["columns"]as$x){if(!isset($J[$x]))continue
2;$I[$x]=$J[$x];}return$I;}}}function
escape_key($x){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$x,$_))return$_[1].idf_escape(idf_unescape($_[2])).$_[3];return
idf_escape($x);}function
where($Z,$q=array()){global$h,$w;$I=array();foreach((array)$Z["where"]as$x=>$X){$x=bracket_escape($x,1);$e=escape_key($x);$I[]=$e.($w=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($w=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($q[$x],q($X))));if($w=="sql"&&preg_match('~char|text~',$q[$x]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$e = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$x)$I[]=escape_key($x)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$q=array()){parse_str($X,$Va);remove_slashes(array(&$Va));return
where($Va,$q);}function
where_link($r,$e,$Y,$we="="){return"&where%5B$r%5D%5Bcol%5D=".urlencode($e)."&where%5B$r%5D%5Bop%5D=".urlencode(($Y!==null?$we:"IS NULL"))."&where%5B$r%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$q,$L=array()){$I="";foreach($f
as$x=>$X){if($L&&!in_array(idf_escape($x),$L))continue;$_a=convert_field($q[$x]);if($_a)$I.=", $_a AS ".idf_escape($x);}return$I;}function
cookie($A,$Y,$Ld=2592000){global$aa;return
header("Set-Cookie: $A=".urlencode($Y).($Ld?"; expires=".gmdate("D, d M Y H:i:s",time()+$Ld)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($Ac=false){$Wg=ini_bool("session.use_cookies");if(!$Wg||$Ac){session_write_close();if($Wg&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$X){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($ah,$N,$V,$m=null){global$Mb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Mb))."|username|".($m!==null?"db|":"").session_name()),$_);return"$_[1]?".(sid()?SID."&":"").($ah!="server"||$N!=""?urlencode($ah)."=".urlencode($N)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($_[2]?"&$_[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Nd,$ae=null){if($ae!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Nd!==null?$Nd:$_SERVER["REQUEST_URI"]))][]=$ae;}if($Nd!==null){if($Nd=="")$Nd=".";header("Location: $Nd");exit;}}function
query_redirect($F,$Nd,$ae,$if=true,$gc=true,$nc=false,$pg=""){global$h,$o,$b;if($gc){$Wf=microtime(true);$nc=!$h->query($F);$pg=format_time($Wf);}$Tf="";if($F)$Tf=$b->messageQuery($F,$pg,$nc);if($nc){$o=error().$Tf.script("messagesPrint();");return
false;}if($if)redirect($Nd,$ae.$Tf);return
true;}function
queries($F){global$h;static$cf=array();static$Wf;if(!$Wf)$Wf=microtime(true);if($F===null)return
array(implode("\n",$cf),format_time($Wf));$cf[]=(preg_match('~;$~',$F)?"DELIMITER ;;\n$F;\nDELIMITER ":$F).";";return$h->query($F);}function
apply_queries($F,$T,$dc='table'){foreach($T
as$R){if(!queries("$F ".$dc($R)))return
false;}return
true;}function
queries_redirect($Nd,$ae,$if){list($cf,$pg)=queries(null);return
query_redirect($cf,$Nd,$ae,$if,false,!$if,$pg);}function
format_time($Wf){return
lang(1,max(0,microtime(true)-$Wf));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($Ge=""){return
substr(preg_replace("~(?<=[?&])($Ge".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($C,$zb){return" ".($C==$zb?$C+1:'<a href="'.h(remove_from_uri("page").($C?"&page=$C".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($C+1)."</a>");}function
get_file($x,$Cb=false){$sc=$_FILES[$x];if(!$sc)return
null;foreach($sc
as$x=>$X)$sc[$x]=(array)$X;$I='';foreach($sc["error"]as$x=>$o){if($o)return$o;$A=$sc["name"][$x];$wg=$sc["tmp_name"][$x];$sb=file_get_contents($Cb&&preg_match('~\.gz$~',$A)?"compress.zlib://$wg":$wg);if($Cb){$Wf=substr($sb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Wf,$jf))$sb=iconv("utf-16","utf-8",$sb);elseif($Wf=="\xEF\xBB\xBF")$sb=substr($sb,3);$I.=$sb."\n\n";}else$I.=$sb;}return$I;}function
upload_error($o){$Xd=($o==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($o?lang(2).($Xd?" ".lang(3,$Xd):""):lang(4));}function
repeat_pattern($Me,$Jd){return
str_repeat("$Me{0,65535}",$Jd/65535)."$Me{0,".($Jd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($Q,$Jd=80,$cg=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Jd).")($)?)u",$Q,$_))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Jd).")($)?)",$Q,$_);return
h($_[1]).$cg.(isset($_[2])?"":"<i>…</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Ye,$ed=array(),$Te=''){$I=false;foreach($Ye
as$x=>$X){if(!in_array($x,$ed)){if(is_array($X))hidden_fields($X,array(),$x);else{$I=true;echo'<input type="hidden" name="'.h($Te?$Te."[$x]":$x).'" value="'.h($X).'">';}}}return$I;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$oc=false){$I=table_status($R,$oc);return($I?$I:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$I=array();foreach($b->foreignKeys($R)as$Ec){foreach($Ec["source"]as$X)$I[$X][]=$Ec;}return$I;}function
enum_input($U,$Da,$p,$Y,$Xb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Ud);$I=($Xb!==null?"<label><input type='$U'$Da value='$Xb'".((is_array($Y)?in_array($Xb,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($Ud[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Xa=(is_int($Y)?$Y==$r+1:(is_array($Y)?in_array($r+1,$Y):$Y===$X));$I.=" <label><input type='$U'$Da value='".($r+1)."'".($Xa?' checked':'').'>'.h($b->editVal($X,$p)).'</label>';}return$I;}function
input($p,$Y,$Kc){global$Jg,$b,$w;$A=h(bracket_escape($p["field"]));echo"<td class='function'>";if(is_array($Y)&&!$Kc){$ya=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$ya[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$ya);$Kc="json";}$of=($w=="mssql"&&$p["auto_increment"]);if($of&&!$_POST["save"])$Kc=null;$Lc=(isset($_GET["select"])||$of?array("orig"=>lang(8)):array())+$b->editFunctions($p);$Da=" name='fields[$A]'";if($p["type"]=="enum")echo
h($Lc[""])."<td>".$b->editInput($_GET["edit"],$p,$Da,$Y);else{$Sc=(in_array($Kc,$Lc)||isset($Lc[$Kc]));echo(count($Lc)>1?"<select name='function[$A]'>".optionlist($Lc,$Kc===null||$Sc?$Kc:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Lc))).'<td>';$pd=$b->editInput($_GET["edit"],$p,$Da,$Y);if($pd!="")echo$pd;elseif(preg_match('~bool~',$p["type"]))echo"<input type='hidden'$Da value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Da value='1'>";elseif($p["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Ud);foreach($Ud[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Xa=(is_int($Y)?($Y>>$r)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$A][$r]' value='".(1<<$r)."'".($Xa?' checked':'').">".h($b->editVal($X,$p)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$A'>";elseif(($mg=preg_match('~text|lob|memo~i',$p["type"]))||preg_match("~\n~",$Y)){if($mg&&$w!="sqlite")$Da.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Da.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Da>".h($Y).'</textarea>';}elseif($Kc=="json"||preg_match('~^jsonb?$~',$p["type"]))echo"<textarea$Da cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Zd=(!preg_match('~int~',$p["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$p["length"],$_)?((preg_match("~binary~",$p["type"])?2:1)*$_[1]+($_[3]?1:0)+($_[2]&&!$p["unsigned"]?1:0)):($Jg[$p["type"]]?$Jg[$p["type"]]+($p["unsigned"]?0:1):0));if($w=='sql'&&min_version(5.6)&&preg_match('~time~',$p["type"]))$Zd+=7;echo"<input".((!$Sc||$Kc==="")&&preg_match('~(?<!o)int(?!er)~',$p["type"])&&!preg_match('~\[\]~',$p["full_type"])?" type='number'":"")." value='".h($Y)."'".($Zd?" data-maxlength='$Zd'":"").(preg_match('~char|binary~',$p["type"])&&$Zd>20?" size='40'":"")."$Da>";}echo$b->editHint($_GET["edit"],$p,$Y);$wc=0;foreach($Lc
as$x=>$X){if($x===""||!$X)break;$wc++;}if($wc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $wc), oninput: function () { this.onchange(); }});");}}function
process_input($p){global$b,$n;$t=bracket_escape($p["field"]);$Kc=$_POST["function"][$t];$Y=$_POST["fields"][$t];if($p["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($p["auto_increment"]&&$Y=="")return
null;if($Kc=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$p["on_update"])?idf_escape($p["field"]):false);if($Kc=="NULL")return"NULL";if($p["type"]=="set")return
array_sum((array)$Y);if($Kc=="json"){$Kc="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads")){$sc=get_file("fields-$t");if(!is_string($sc))return
false;return$n->quoteBinary($sc);}return$b->processInput($p,$Y,$Kc);}function
fields_from_edit(){global$n;$I=array();foreach((array)$_POST["field_keys"]as$x=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$x];$_POST["fields"][$X]=$_POST["field_vals"][$x];}}foreach((array)$_POST["fields"]as$x=>$X){$A=bracket_escape($x,1);$I[$A]=array("field"=>$A,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($x==$n->primary),);}return$I;}function
search_tables(){global$b,$h;$_GET["where"][0]["val"]=$_POST["query"];$Ef="<ul>\n";foreach(table_status('',true)as$R=>$S){$A=$b->tableName($S);if(isset($S["Engine"])&&$A!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$H=$h->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$H||$H->fetch_row()){$We="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$A</a>";echo"$Ef<li>".($H?$We:"<p class='error'>$We: ".error())."\n";$Ef="";}}}echo($Ef?"<p class='message'>".lang(9):"</ul>")."\n";}function
dump_headers($bd,$fe=false){global$b;$I=$b->dumpHeaders($bd,$fe);$De=$_POST["output"];if($De!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($bd).".$I".($De!="file"&&preg_match('~^[0-9a-z]+$~',$De)?".$De":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$x=>$X){if(preg_match('~["\n,;\t]|^0|\.\d*0$~',$X)||$X==="")$J[$x]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($Kc,$e){return($Kc?($Kc=="unixepoch"?"DATETIME($e, '$Kc')":($Kc=="count distinct"?"COUNT(DISTINCT ":strtoupper("$Kc("))."$e)"):$e);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$tc=@tempnam("","");if(!$tc)return
false;$I=dirname($tc);unlink($tc);}}return$I;}function
file_open_lock($tc){$Ic=@fopen($tc,"r+");if(!$Ic){$Ic=@fopen($tc,"w");if(!$Ic)return;chmod($tc,0660);}flock($Ic,LOCK_EX);return$Ic;}function
file_write_unlock($Ic,$_b){rewind($Ic);fwrite($Ic,$_b);ftruncate($Ic,strlen($_b));flock($Ic,LOCK_UN);fclose($Ic);}function
password_file($vb){$tc=get_temp_dir()."/adminer.key";$I=@file_get_contents($tc);if($I||!$vb)return$I;$Ic=@fopen($tc,"w");if($Ic){chmod($tc,0660);$I=rand_string();fwrite($Ic,$I);fclose($Ic);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$z,$p,$ng){global$b;if(is_array($X)){$I="";foreach($X
as$xd=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($xd):"")."<td>".select_value($W,$z,$p,$ng);return"<table cellspacing='0'>$I</table>";}if(!$z)$z=$b->selectLink($X,$p);if($z===null){if(is_mail($X))$z="mailto:$X";if(is_url($X))$z=$X;}$I=$b->editVal($X,$p);if($I!==null){if(!is_utf8($I))$I="\0";elseif($ng!=""&&is_shortable($p))$I=shorten_utf8($I,max(0,+$ng));else$I=h($I);}return$b->selectVal($I,$z,$p,$X);}function
is_mail($Ub){$Aa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Me="$Aa+(\\.$Aa+)*@($Lb?\\.)+$Lb";return
is_string($Ub)&&preg_match("(^$Me(,\\s*$Me)*\$)i",$Ub);}function
is_url($Q){$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Lb?\\.)+$Lb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($p){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$p["type"]);}function
count_rows($R,$Z,$ud,$Mc){global$w;$F=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($ud&&($w=="sql"||count($Mc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Mc).")$F":"SELECT COUNT(*)".($ud?" FROM (SELECT 1$F GROUP BY ".implode(", ",$Mc).") x":$F));}function
slow_query($F){global$b,$yg,$n;$m=$b->database();$qg=$b->queryTimeout();$Nf=$n->slowQuery($F,$qg);if(!$Nf&&support("kill")&&is_object($i=connect())&&($m==""||$i->select_db($m))){$Bd=$i->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$Bd,'&token=',$yg,'\');
}, ',1000*$qg,');
</script>
';}else$i=null;ob_flush();flush();$I=@get_key_vals(($Nf?$Nf:$F),$i,false);if($i){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$ef=rand(1,1e6);return($ef^$_SESSION["token"]).":$ef";}function
verify_token(){list($yg,$ef)=explode(":",$_POST["token"]);return($ef^$_SESSION["token"])==$yg;}function
lzw_decompress($Na){$Jb=256;$Oa=8;$db=array();$qf=0;$rf=0;for($r=0;$r<strlen($Na);$r++){$qf=($qf<<8)+ord($Na[$r]);$rf+=8;if($rf>=$Oa){$rf-=$Oa;$db[]=$qf>>$rf;$qf&=(1<<$rf)-1;$Jb++;if($Jb>>$Oa)$Oa++;}}$Ib=range("\0","\xFF");$I="";foreach($db
as$r=>$cb){$Tb=$Ib[$cb];if(!isset($Tb))$Tb=$nh.$nh[0];$I.=$Tb;if($r)$Ib[]=$nh.$Tb[0];$nh=$Tb;}return$I;}function
on_help($ib,$Lf=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $ib, $Lf) }, onmouseout: helpMouseout});","");}function
edit_form($a,$q,$J,$Rg){global$b,$w,$yg,$o;$gg=$b->tableName(table_status1($a,true));page_header(($Rg?lang(10):lang(11)),$o,array("select"=>array($a,$gg)),$gg);if($J===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$q)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($q
as$A=>$p){echo"<tr><th>".$b->fieldName($p);$Db=$_GET["set"][bracket_escape($A)];if($Db===null){$Db=$p["default"];if($p["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Db,$jf))$Db=$jf[1];}$Y=($J!==null?($J[$A]!=""&&$w=="sql"&&preg_match("~enum|set~",$p["type"])?(is_array($J[$A])?array_sum($J[$A]):+$J[$A]):$J[$A]):(!$Rg&&$p["auto_increment"]?"":(isset($_GET["select"])?false:$Db)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$p);$Kc=($_POST["save"]?(string)$_POST["function"][$A]:($Rg&&preg_match('~^CURRENT_TIMESTAMP~i',$p["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$p["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$Kc="now";}input($p,$Y,$Kc);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($q){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Rg?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Rg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."…', this); };"):"");}}echo($Rg?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$q?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$yg,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0�\0\n @\0�C��\"\0`E�Q����?�tvM'�Jd�d\\�b0\0�\"��fӈ��s5����A�XPaJ�0���8�#R�T��z`�#.��c�X��Ȁ?�-\0�Im?�.�M��\0ȯ(̉��/(%�\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇�ٌ�l7��B1�4vb0��fs���n2B�ѱ٘�n:�#(�b.\rDc)��a7E����l�ñ��i1̎s���-4��f�	��i7�����t4���y�Zf4��i�AT�VV��f:Ϧ,:1�Qݼ�b2`�#�>:7G�1���s��L�XD*bv<܌#�e@�:4�!fo���t:<��咾�o��\ni���',�a_�:�i�Bv�|N�4.5Nf�i�vp�h��l��֚�O����= �OFQ��k\$��i����d2T�p��6�����-�Z�����6����h:�a�,����2�#8А�#��6n����J��h�t�����4O42��ok��*r���@p@�!������?�6��r[��L���:2B�j�!Hb��P�=!1V�\"��0��\nS���D7��Dڛ�C!�!��Gʌ� �+�=tC�.C��:+��=�������%�c�1MR/�EȒ4���2�䱠�`�8(�ӹ[W��=�yS�b�=�-ܹBS+ɯ�����@pL4Yd��q�����6�3Ĭ��Ac܌�Ψ�k�[&>���Z�pkm]�u-c:���Nt�δpҝ��8�=�#��[.��ޯ�~���m�y�PP�|I֛���Q�9v[�Q��\n��r�'g�+��T�2��V��z�4��8��(	�Ey*#j�2]��R����)��[N�R\$�<>:�>\$;�>��\r���H��T�\nw�N �wأ��<��Gw����\\Y�_�Rt^�>�\r}��S\rz�4=�\nL�%J��\",Z�8����i�0u�?�����s3#�ى�:���㽖��E]x���s^8��K^��*0��w����~���:��i���v2w����^7���7�c��u+U%�{P�*4̼�LX./!��1C��qx!H��Fd��L���Ġ�`6��5��f��Ć�=H�l �V1��\0a2�;��6����_ه�\0&�Z�S�d)KE'��n��[X��\0ZɊ�F[P�ޘ@��!��Y�,`�\"ڷ��0Ee9yF>��9b����F5:���\0}Ĵ��(\$����37H��� M�A��6R��{Mq�7G��C�C�m2�(�Ct>[�-t�/&C�]�etG�̬4@r>���<�Sq�/���Q�hm���������L��#��K�|���6fKP�\r%t��V=\"�SH\$�} ��)w�,W\0F��u@�b�9�\rr�2�#�D��X���yOI�>��n��Ǣ%���'��_��t\rτz�\\1�hl�]Q5Mp6k���qh�\$�H~�|��!*4����`S���S t�PP\\g��7�\n-�:袪p����l�B���7Өc�(wO0\\:��w���p4���{T��jO�6HÊ�r���q\n��%%�y']\$��a�Z�.fc�q*-�FW��k��z���j���lg�:�\$\"�N�\r#�d�Â���sc�̠��\"j�\r�����Ւ�Ph�1/��DA)���[�kn�p76�Y��R{�M�P���@\n-�a�6��[�zJH,�dl�B�h�o�����+�#Dr^�^��e��E��� ĜaP���JG�z��t�2�X�����V�����ȳ��B_%K=E��b弾�§kU(.!ܮ8����I.@�K�xn���:�P�32��m�H		C*�:v�T�\nR�����0u�����ҧ]�����P/�JQd�{L�޳:Y��2b��T ��3�4���c�V=���L4��r�!�B�Y�6��MeL������i�o�9< G��ƕЙMhm^�U�N����Tr5HiM�/�n�흳T��[-<__�3/Xr(<���������uҖGNX20�\r\$^��:'9�O��;�k����f��N'a����b�,�V��1��HI!%6@��\$�EGڜ�1�(mU��rս���`��iN+Ü�)���0l��f0��[U��V��-:I^��\$�s�b\re��ug�h�~9�߈�b�����f�+0�� hXrݬ�!\$�e,�w+����3��_�A�k��\nk�r�ʛcuWdY�\\�={.�č���g��p8�t\rRZ�v�J:�>��Y|+�@����C�t\r��jt��6��%�?��ǎ�>�/�����9F`ו��v~K�����R�W��z��lm�wL�9Y�*q�x�z��Se�ݛ����~�D�����x���ɟi7�2���Oݻ��_{��53��t���_��z�3�d)�C��\$?KӪP�%��T&��&\0P�NA�^�~���p� �Ϝ���\r\$�����b*+D6궦ψ��J\$(�ol��h&��KBS>���;z��x�oz>��o�Z�\nʋ[�v���Ȝ��2�OxِV�0f�����2Bl�bk�6Zk�hXcd�0*�KT�H=��π�p0�lV����\r���n�m��)(� �");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:��gCI��\n8��3)��7���81��x:\nOg#)��r7\n\"��`�|2�gSi�H)N�S��\r��\"0��@�)�`(\$s6O!��V/=��' T4�=��iS��6IO�G#�X�VC��s��Z1.�hp8,�[�H�~Cz���2�l�c3���s���I�b�4\n�F8T��I���U*fz��r0�E����y���f�Y.:��I��(�c��΋!�_l��^�^(��N{S��)r�q�Y��l٦3�3�\n�+G���y���i���xV3w�uh�^r����a۔���c��\r���(.��Ch�<\r)�ѣ�`�7���43'm5���\n�P�:2�P����q ���C�}ī�����38�B�0�hR��r(�0��b\\0�Hr44��B�!�p�\$�rZZ�2܉.Ƀ(\\�5�|\nC(�\"��P���.��N�RT�Γ��>�HN��8HP�\\�7Jp~���2%��OC�1�.��C8·H��*�j����S(�/��6KU����<2�pOI���`���ⳈdO�H��5�-��4��pX25-Ң�ۈ�z7��\"(�P�\\32:]U����߅!]�<�A�ۤ���iڰ�l\r�\0v��#J8��wm��ɤ�<�ɠ��%m;p#�`X�D���iZ��N0����9��占��`��wJ�D��2�9t��*��y��NiIh\\9����:����xﭵyl*�Ȉ��Y�����8�W��?���ޛ3���!\"6�n[��\r�*\$�Ƨ�nzx�9\r�|*3ףp�ﻶ�:(p\\;��mz���9����8N���j2����\r�H�H&��(�z��7i�k� ����c��e���t���2:SH�Ƞ�/)�x�@��t�ri9����8����yҷ���V�+^Wڦ��kZ�Y�l�ʣ���4��Ƌ������\\E�{�7\0�p���D��i�-T����0l�%=���˃9(�5�\n\n�n,4�\0�a}܃.��Rs\02B\\�b1�S�\0003,�XPHJsp�d�K� CA!�2*W����2\$�+�f^\n�1����zE� Iv�\\�2��.*A���E(d���b��܄��9����Dh�&��?�H�s�Q�2�x~nÁJ�T2�&��eR���G�Q��Tw�ݑ��P���\\�)6�����sh\\3�\0R	�'\r+*;R�H�.�!�[�'~�%t< �p�K#�!�l���Le����,���&�\$	��`��CX��ӆ0֭����:M�h	�ڜG��!&3�D�<!�23��?h�J�e ��h�\r�m���Ni�������N�Hl7��v��WI�.��-�5֧ey�\rEJ\ni*�\$@�RU0,\$U�E����ªu)@(t�SJk�p!�~���d`�>��\n�;#\rp9�jɹ�]&Nc(r���TQU��S��\08n`��y�b���L�O5��,��>���x���f䴒���+��\"�I�{kM�[\r%�[	�e�a�1! ���Ԯ�F@�b)R��72��0�\nW���L�ܜҮtd�+���0wgl�0n@��ɢ�i�M��\nA�M5n�\$E�ױN��l�����%�1 A������k�r�iFB���ol,muNx-�_�֤C( ��f�l\r1p[9x(i�BҖ��zQl��8C�	��XU Tb��I�`�p+V\0��;�Cb��X�+ϒ�s��]H��[�k�x�G*�]�awn�!�6�����mS�I��K�~/�ӥ7��eeN��S�/;d�A�>}l~��� �%^�f�آpڜDE��a��t\nx=�kЎ�*d���T����j2��j��\n��� ,�e=��M84���a�j@�T�s���nf��\n�6�\rd��0���Y�'%ԓ��~	�Ҩ�<���AH�G��8���΃\$z��{���u2*��a��>�(w�K.bP�{��o��´�z�#�2�8=�8>���A,�e���+�C�x�*���-b=m���,�a��lzk���\$W�,�m�Ji�ʧ���+���0�[��.R�sK���X��ZL��2�`�(�C�vZ������\$�׹,�D?H��NxX��)��M��\$�,��*\nѣ\$<q�şh!��S����xsA!�:�K��}�������R��A2k�X�p\n<�����l���3�����VV�}�g&Yݍ!�+�;<�Y��YE3r�َ��C�o5����ճ�kk�����ۣ��t��U���)�[����}��u��l�:D��+Ϗ _o��h140���0��b�K�㬒�����lG��#��������|Ud�IK���7�^��@��O\0H��Hi�6\r����\\cg\0���2�B�*e��\n��	�zr�!�nWz&� {H��'\$X �w@�8�DGr*���H�'p#�Į���\nd���,���,�;g~�\0�#����E��\r�I`��'��%E�.�]`�Л��%&��m��\r��%4S�v�#\n��fH\$%�-�#���qB�����Q-�c2���&���]�� �qh\r�l]�s���h�7�n#����-�jE�Fr�l&d����z�F6����\"���|���s@����z)0rpڏ\0�X\0���|DL<!��o�*�D�{.B<E���0nB(� �|\r\n�^���� h�!���r\$��(^�~����/p�q��B��O����,\\��#RR��%���d�Hj�`����̭ V� bS�d�i�E���oh�r<i/k\$-�\$o��+�ŋ��l��O�&evƒ�i�jMPA'u'���( M(h/+��WD�So�.n�.�n���(�(\"���h�&p��/�/1D̊�j娸E��&⦀�,'l\$/.,�d���W�bbO3�B�sH�:J`!�.���������,F��7(��Կ��1�l�s �Ҏ���Ţq�X\r����~R鰱`�Ҟ�Y*�:R��rJ��%L�+n�\"��\r��͇H!qb�2�Li�%����Wj#9��ObE.I:�6�7\0�6+�%�.����a7E8VS�?(DG�ӳB�%;���/<�����\r ��>�M��@���H�Ds��Z[tH�Enx(���R�x��@��GkjW�>���#T/8�c8�Q0��_�IIGII�!���YEd�E�^�td�th�`DV!C�8��\r���b�3�!3�@�33N}�ZB�3	�3�30��M(�>��}�\\�t�f�f���I\r���337 X�\"td�,\nbtNO`P�;�ܕҭ���\$\n����Zѭ5U5WU�^ho���t�PM/5K4Ej�KQ&53GX�Xx)�<5D��\r�V�\n�r�5b܀\\J\">��1S\r[-��Du�\r���)00�Y��ˢ�k{\n��#��\r�^��|�uܻU�_n�U4�U�~Yt�\rI��@䏳�R �3:�uePMS�0T�wW�X���D��KOU����;U�\n�OY��Y�Q,M[\0�_�D���W��J*�\rg(]�\r\"ZC��6u�+�Y��Y6ô�0�q�(��8}��3AX3T�h9j�j�f�Mt�PJbqMP5>������Y�k%&\\�1d��E4� �Yn���\$<�U]Ӊ1�mbֶ�^�����\"NV��p��p��eM���W�ܢ�\\�)\n �\nf7\n�2��r8��=Ek7tV����7P��L��a6��v@'�6i��j&>��;��`��a	\0pڨ(�J��)�\\��n��Ĭm\0��2��eqJ��P��t��fj��\"[\0����X,<\\������+md��~�����s%o��mn�),ׄ�ԇ�\r4��8\r����mE�H]�����HW�M0D�߀��~�ˁ�K��E}����|f�^���\r>�-z]2s�xD�d[s�t�S��\0Qf-K`���t���wT�9��Z��	�\nB�9 Nb��<�B�I5o�oJ�p��JNd��\r�hލ��2�\"�x�HC�ݍ�:���9Yn16��zr+z���\\�����m ��T ���@Y2lQ<2O+�%��.Ӄh�0A���Z��2R��1��/�hH\r�X��aNB&� �M@�[x��ʮ���8&L�V͜v�*�j�ۚGH��\\ٮ	���&s�\0Q��\\\"�b��	��\rBs��w��	���BN`�7�Co(���\nè���1�9�*E� �S��U�0U� t�'|�m���?h[�\$.#�5	 �	p��yB�@R�]���@|��{���P\0x�/� w�%�EsBd���CU�~O׷�P�@X�]����Z3��1��{�eLY���ڐ�\\�(*R`�	�\n������QCF�*�����霬�p�X|`N���\$�[���@�U������Z�`Zd\"\\\"����)��I�:�t��oD�\0[�����-���g���*`hu%�,����I�7ī�H�m�6�}��N�ͳ\$�M�UYf&1����e]pz���I��m�G/� �w �!�\\#5�4I�d�E�hq���Ѭk�x|�k�qD�b�z?���>���:��[�L�ƬZ�X��:�������j�w5	�Y��0 ���\$\0C��dSg����{�@�\n`�	���C ���M�����# t}x�N����{�۰)��C��FKZ�j��\0PFY�B�pFk��0<�>�D<JE��g\r�.�2��8�U@*�5fk��JD���4��TDU76�/��@��K+���J�����@�=��WIOD�85M��N�\$R�\0�5�\r��_���E���I�ϳN�l���y\\����qU��Q���\n@���ۺ�p���P۱�7ԽN\r�R{*�qm�\$\0R��ԓ���q�È+U@�B��Of*�Cˬ�MC��`_ ���˵N��T�5٦C׻� ��\\W�e&_X�_؍h���B�3���%�FW���|�Gޛ'�[�ł����V��#^\r��GR����P��Fg�����Yi ���z\n��+�^/�������\\�6��b�dmh��@q���Ah�),J��W��cm�em]�ӏe�kZb0�����Y�]ym��f�e�B;���O��w�apDW�����{�\0��-2/bN�sֽ޾Ra�Ϯh&qt\n\"�i�Rm�hz�e����FS7��PP�䖤��:B����sm��Y d���7}3?*�t����lT�}�~�����=c������	��3�;T�L�5*	�~#�A����s�x-7��f5`�#\"N�b��G����@�e�[�����s����-��M6��qq� h�e5�\0Ң���*�b�IS���Fή9}�p�-��`{��ɖkP�0T<��Z9�0<՚\r��;!��g�\r\nK�\n��\0��*�\nb7(�_�@,�e2\r�]�K�+\0��p C\\Ѣ,0�^�MЧ����@�;X\r��?\$\r�j�+�/��B��P�����J{\"a�6�䉜�|�\n\0��\\5���	156�� .�[�Uد\0d��8Y�:!���=��X.�uC����!S���o�p�B���7��ů�Rh�\\h�E=�y:< :u��2�80�si��TsB�@\$ ��@�u	�Q���.��T0M\\/�d+ƃ\n��=��d���A���)\r@@�h3���8.eZa|.�7�Yk�c���'D#��Y�@X�q�=M��44�B AM��dU\"�Hw4�(>��8���C�?e_`��X:�A9ø���p�G��Gy6��F�Xr��l�1��ػ�B�Å9Rz��hB�{����\0��^��-�0�%D�5F\"\"�����i�`��nAf� \"tDZ\"_�V\$��!/�D�ᚆ������٦�̀F,25�j�T��y\0�N�x\r�Yl��#��Eq\n��B2�\n��6���4���!/�\n��Q��*�;)bR�Z0\0�CDo�˞�48������e�\n�S%\\�PIk��(0��u/��G������\\�}�4Fp��G�_�G?)g�ot��[v��\0��?b�;��`(�ی�NS)\n�x=��+@��7��j�0��,�1Åz����>0��Gc��L�VX�����%����Q+���o�F���ܶ�>Q-�c���l����w��z5G��@(h�c�H��r?��Nb�@�������lx3�U`�rw���U���t�8�=�l#���l�䨉8�E\"����O6\n��1e�`\\hKf�V/зPaYK�O�� ��x�	�Oj���r7�F;��B����̒��>�Ц�V\rĖ�|�'J�z����#�PB��Y5\0NC�^\n~LrR��[̟Rì�g�eZ\0x�^�i<Q�/)�%@ʐ��fB�Hf�{%P�\"\"���@���)���DE(iM2�S�*�y�S�\"���e̒1��ט\n4`ʩ>��Q*��y�n����T�u�����~%�+W��XK���Q�[ʔ��l�PYy#D٬D<�FL���@�6']Ƌ��\rF�`�!�%\n�0�c���˩%c8WrpG�.T�Do�UL2�*�|\$�:�r��@���&�4��H�> ���%0*�Zc(@�]��Q:*���(&\"x�'JO�1��`>7	#�\"O4PX���|B4��[���٘\$n�1`��GSA���AH��\"�)���S��f�ɦ��-\"�W�+ɖ�\0s-[�fo٧�D��x����=C�.��9���f��c�\07�?Ó95�֦Z�0��f�����H?R'q>o��@aD���G[;G�D�BBdġ�q���2�|1��q������w<�#��EY�^����Q\\�[X����>?v�[ ��I��� ����g\0�)���g�u��g42jú'�T�����vy,u��D�=p�H\\��^b��q���it���X���FP�@P��T��i2#�g��Dᮙ�%9�@�");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$Ic=file_open_lock(get_temp_dir()."/adminer.version");if($Ic)file_write_unlock($Ic,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$n,$Mb,$Rb,$Zb,$o,$Lc,$Pc,$aa,$od,$w,$ba,$Fd,$se,$Oe,$Zf,$Tc,$yg,$Bg,$Jg,$Qg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$D=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$D[]=true;call_user_func_array('session_set_cookie_params',$D);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$vc);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$Fd=array('en'=>'English','ar'=>'العربية','bg'=>'Български','bn'=>'বাংলা','bs'=>'Bosanski','ca'=>'Català','cs'=>'Čeština','da'=>'Dansk','de'=>'Deutsch','el'=>'Ελληνικά','es'=>'Español','et'=>'Eesti','fa'=>'فارسی','fi'=>'Suomi','fr'=>'Français','gl'=>'Galego','he'=>'עברית','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'日本語','ka'=>'ქართული','ko'=>'한국어','lt'=>'Lietuvių','ms'=>'Bahasa Melayu','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'Português','pt-br'=>'Português (Brazil)','ro'=>'Limba Română','ru'=>'Русский','sk'=>'Slovenčina','sl'=>'Slovenski','sr'=>'Српски','sv'=>'Svenska','ta'=>'த‌மிழ்','th'=>'ภาษาไทย','tr'=>'Türkçe','uk'=>'Українська','vi'=>'Tiếng Việt','zh'=>'简体中文','zh-tw'=>'繁體中文',);function
get_lang(){global$ba;return$ba;}function
lang($t,$oe=null){if(is_string($t)){$Re=array_search($t,get_translations("en"));if($Re!==false)$t=$Re;}global$ba,$Bg;$Ag=($Bg[$t]?$Bg[$t]:$t);if(is_array($Ag)){$Re=($oe==1?0:($ba=='cs'||$ba=='sk'?($oe&&$oe<5?1:2):($ba=='fr'?(!$oe?0:1):($ba=='pl'?($oe%10>1&&$oe%10<5&&$oe/10%10!=1?1:2):($ba=='sl'?($oe%100==1?0:($oe%100==2?1:($oe%100==3||$oe%100==4?2:3))):($ba=='lt'?($oe%10==1&&$oe%100!=11?0:($oe%10>1&&$oe/10%10!=1?1:2)):($ba=='bs'||$ba=='ru'||$ba=='sr'||$ba=='uk'?($oe%10==1&&$oe%100!=11?0:($oe%10>1&&$oe%10<5&&$oe/10%10!=1?1:2)):1)))))));$Ag=$Ag[$Re];}$ya=func_get_args();array_shift($ya);$Gc=str_replace("%d","%s",$Ag);if($Gc!=$Ag)$ya[0]=format_number($oe);return
vsprintf($Gc,$ya);}function
switch_lang(){global$ba,$Fd;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$Fd,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($Fd[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($Fd[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$qa=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$Ud,PREG_SET_ORDER);foreach($Ud
as$_)$qa[$_[1]]=(isset($_[3])?$_[3]:1);arsort($qa);foreach($qa
as$x=>$bf){if(isset($Fd[$x])){$ba=$x;break;}$x=preg_replace('~-.*~','',$x);if(!isset($qa[$x])&&isset($Fd[$x])){$ba=$x;break;}}}$Bg=$_SESSION["translations"];if($_SESSION["translations_version"]!=294525227){$Bg=array();$_SESSION["translations_version"]=294525227;}function
get_translations($Ed){switch($Ed){case"en":$g="A9D�y�@s:�G�(�ff�����	��:�S���a2\"1�..L'�I��m�#�s,�K��OP#I�@%9��i4�o2ύ���,9�%�P�b2��a��r\n2�NC�(�r4��1C`(�:Eb�9A�i:�&㙔�y��F��Y��\r�\n� 8Z�S=\$A����`�=�܌���0�\n��dF�	��n:Zΰ)��Q���mw����O��mfpQ�΂��q��a�į�#q��w7S�X3������o�\n>Z�M�zi��s;�̒��_�:���#|@�46��:�\r-z|�(j*���0�:-h��/̸�8)+r^1/Л�η,�ZӈKX�9,�p�:>#���(�6�qB�7��4���2�Lt���D���:��\"��IR{� p*��	��.���\nH�h\n|Z29Cz�7L����H\nj=5��(�/\n��C�:�����0ʖ��ZtXj��8�4N`�;�P�9Ikl �m�_H\"����0#0ckP:�CP�S#��Iƍ�&)�E�U\nL�<A9  �]@\$#-��'�[Uc�+�`�:�P�\$Bh�\nb�-�7(�.�hZ2M�J��k�6B;��0���\"�ƎSH΂�\"�ލM�p򍯃��1�#��:���݅��P��������3�^\r�R�b��8�+����!��������:��0�5`�>�x�(�\n�[���S��ɝ/��]G�@\$cB3��[�t���\$�����|���D7�}���x�!�����X�4���;H�y�9�%	R�\n��,��q	�]���ñ��.ϴ�{jֿۆ�Jp#_���\"����2@A?�zB�M�Zx��Ӆ�Hp�~��=���Ò[D��ZJ0�<(�b��09i��h��#3;�ez&���Y����0Ɓ\0�N2��0=l���y�J����_ɨ \n ( ���� \0�\"H��&4D�!��~�Ni�#FD4�2.eIA���bL���S\$�0�{��7~\$�7xd1�\n`4�7vZ[�3�1��hѺ9Gd�!�0���\r�m^�vI90f��Ȓ�ZK��B���HIN8d'�=�W5���-o��\$�H� �ܐ�u���� !�ٕH�Z�St�h����G��'Ǹʴ���L\n	�L*C��5a�.S�֣�>�}'�rJs��}yE܀��JA��d��@H�\0gL(��H���#�R��tX�ix���d�&\0JI�&,�-C�q�\\1�%�bNPʲ��S�'�H��\r�~3�Q_��Ʊg3���}���8����+�C��`+��5��H⑳�N�������	'�G=@B�F��%���sIB�0i�{Nb[\n���0F��9����z�M#������qI������Û5�J��.��`.��*�3j��]x5�ɠAFb�?�ᴳ�c��ITL�F���@o'�/D�Ný:�j�t*j�7�p<B��PN\n�Qx�6AR���4UV�W�_�YOVl���A�\r�-Z�;HHm0.";break;case"ar":$g="�C�P���l*�\r�,&\n�A���(J.��0Se\\�\r��b�@�0�,\nQ,l)���µ���A��j_1�C�M��e��S�\ng@�Og���X�DM�)��0��cA��n8�e*y#au4�� �Ir*;rS�U�dJ	}���*z�U�@��X;ai1l(n������[�y�d�u'c(��oF����e3�Nb���p2N�S��ӳ:LZ�z�P�\\b�u�.�[�Q`u	!��Jy��&2��(gT��SњM�x�5g5�K�K�¦����0ʀ(�7\rm8�7(�9\r�f\"7N�9�� ��4�x荶��x�;�#\"�������2ɰW\"J\nB��'hk�ūb�Di�\\@���p���yf���9����V�?�TXW���F��{�3)\"�W9�|��eRhU��Ҫ�1��P�>���\"o|�7���LQi\\� H\"����#��0[~�5�[g��uҩ�!J���v7cH�N&f��4�(!��LX��<_T?t�*�	��1D��X�=�î�3�%׊�~�\"s���1\n�?hAj�&�\$��!P�#�0��M8�xH���im��Zԏ<dR���I�\r/h�P�&�ӨRڱ3��ŗ�!]�6�N�����\"7�&��b-���m'=�� �W\$\rD���L��7�rldՊ��+nP��2ٰQb�@�	�ht)�`P�5�h��c�0����[O�=� P�:\r�S<�#�J7��0�����-���b���\$�*\r�@�0���@:Ӄ��1�C��:��\0�7��P�6���0���ra-�6�C�vaK����`(;��m1���V�b�E\0006c5 :ӯX@ ����q�?N��0@-�3��:����x���s�APH���p_	RC�=�A���=C8x�!�J� L��.S��F*�2��x���\rm��>���L�j7a�ԡ�@�ʙ��\"'��CC�y/-����û�z���'��^�{�uO��DS�I\r��׆׺[�Q���޶M�<!�҆�8����\r�Ч��|u��%'�c��p���Ae%ֆ�JC�S��;��\n�(p@��9Ce�C4C\r���7\n��J����E�6a� pV����=F���IX�'Z��#s �Pp\r�\\�&~�\r*\nG�\$D٨CS��0��hj\rQ�5��2��4�͙�B�^C�p�-b�����4:��7�75C�D1��0�Hgy`�4G�J��l�Г��dS\nAR(B������!�NT�I!'�\"iF�U�st�%P��\0�3�+b��H#V	(e��#���X.!j�#5�I��Q��\$���g�\0d\r+dӡt ��6mx8�Sd��2\r���)���B�]!�b�HlNP5>\0�¡\"-J�sF�+[e�Q��A	�8U蒤��B���ܫ*�m�\"��U�Y:������ymO��(��giD�@��ý`@�C�L(��@�� 5�#@�a郔�hm�S�tF�1�AL�W�a`O�\n�P��Ϫ��u�u�1�N�ZD`D�7O���D�[\0��T���\0�B�w�3a�9�WPCHc\rjY<P�!鴯���4�f���F�!��!y��¨T��)}J�]�'JŃ[��!��莭�H�)l`��\0�\0��PM��y�5J�ւHdh�{%�F�It��ܭ�n�J��������\$D\\*:��\0PL\r�6��\"�q�3����͒�������?צN7�ߢHy�)��2�&+]�V�#��}��Һш�u�`���ɦ�Q+��wk��%��\0";break;case"bg":$g="�P�\r�E�@4�!Awh�Z(&��~\n��fa��N�`���D��4���\"�]4\r;Ae2��a�������.a���rp��@ד�|.W.X4��FP�����\$�hR�s���}@�Зp�Д�B�4�sE�΢7f�&E�,��i�X\nFC1��l7c��MEo)_G����_<�Gӭ}���,k놊qPX�}F�+9���7i��Z贚i�Q��_a���Z��*�n^���S��9���Y�V��~�]�X\\R�6���}�j�}	�l�4�v��=��3	�\0�@D|�¤���[�����^]#�s.�3d\0*��X�7��p@2�C��9(� �:#�9��\0�7���A����8\\z8Fc�������m X���4�;��r�'HS���2�6A>�¦�6��5	�ܸ�kJ��&�j�\"K������9�{.��-�^�:�*U?�+*>S�3z>J&SK�&���hR����&�:��ɒ>I�J���L�H�,���/�\r/��SYF.�Rc[?IL��#�b6F�pA��u�d�Ve�2���7cH�l.(�:��>ؿ-�)���V�5԰КRf��e�rh���i�ʍW4��&�+Œد�\\�A#\"�-(���V\"����?	���Zx�j��K�\0�+@�\"M*�EV�\nC����fW%i@\"���+�)��]NJb�BY����6#��'�,}����qA������(�R*ZWE*���˲��x�؞+o��{I|,��K���x�+���H�Ѡ��2P�Bں�r�Z���g}�*��*l.��Z;��:T��O2�7��U��;k�=��w˓��76��)R��L���\$pRM�֨k���ή��v�<��y���?}F�L��j��x�Jf���\n�����7�3�T5w:�o�}z~]�Q��`����{ŉ-vl\\PѫB���6r�A�1'3*�Q�fY��l���d\r��7\"���������@r��� ��p`�����pa�P��V�z���gE��x\"�1�@�xa�t��!���*j��`��^I�=�x��_@�x����a	�`\$��5<�D��ayAj�ٓ�]a|1�p�Øwa�w�1�ȏb��Z�b'����h*�b,E����2�8��|#�)�:m	�r����˥}ro+Y+r��'�^}�A�5Gt���tʙ�*�l�*�Cc��lv�\0bF��A��C+!�k\$|�9a�:�\0��<\$���:�A?Q�Ɲ\0�1�(V�pa\r���3��L��L�����#�xV��Z;Jw��:\n (Q�2g4���R^d	Y5mi�\0����,ڊ��7�\0��Hvi�3Κ|����Ga�Щ��L\r�Ԩ^�\$��U���CH�90��Hc�Ќ3�yj�c0p2�Ұ��f'ԠB�xL�I\r��DGI�^Y�)����H��̪Xz����ʃ�5j:Sh��S�R�������+�e��tU�q\rIe�6���i�sz鬏�z��{�mvA���xS�R�ޕ�ZT���Ұ�)�F�SJ�\0�ң���o�m���v��K�w΁a�HW��Iy�7S�{%��K\$�;pyZ������w�~=5(��͓�9*�:�Bh��&����+hXA\0S\n!0��B�M0�*RT	3�Y/)iJ_�f�FS{vNĨ+\0XP����_��^>{y!�+�vX*f�Y3U�ib��N���kʌ��dI��N��3�}����r���\r�f�V3]�!�@�\n���&,�inW�N���\\-J�\"�kt�6bcN�&Q�����\0�0-\n^�Vx��#c8�ч�䡌١�����j��,[�Z��ٚ��;�ՁU��i��Qs\\�8��d� #ΚZ��7f��1����w/�dh{���O\"Ῠ��\"�J1�˥T��A�?k��)Y���-�Ϭ�:��z���w���*%R�d(TF�\\. �l�KWf^��T�ijz�s7.<�7R��|M�J��B�\"�֦�u�6a�A��'\0p&'~���y��T����3e�����eqϴ#�";break;case"bn":$g="�S)\nt]\0_� 	XD)L��@�4l5���BQp�� 9��\n��\0��,��h�SE�0�b�a%�. �H�\0��.b��2n��D�e*�D��M���,OJÐ��v����х\$:IK��g5U4�L�	Nd!u>�&������a\\�@'Jx��S���4�P�D�����z�.S��E<�OS���kb�O�af�hb�\0�B���r��)����Q��W��E�{K��PP~�9\\��l*�_W	��7��ɼ� 4N�Q�� 8�'cI��g2��O9��d0�<�CA��:#ܺ�%3��5�!n�nJ�mk����,q���@ᭋ�(n+L�9�x���k�I��2�L\0I��#Vܦ�#`�������B��4��:�� �,X���2����,(_)��7*�\n�p���p@2�C��9.�#�\0�#��2\r��7���8M���:�c��2@�L�� �S6�\\4�Gʂ\0�/n:&�.Ht��ļ/��0��2�TgPEt̥L�,L5H����L��G��j�%���R�t����-I�04=XK�\$Gf�Jz��R\$�a`(�����+b0��z��5qL�/\n��S�5\"�P�`��@/r��M�X�~���N����7cH߆Q(L�\$��>��(]x�W�}�YT���W5e�޵}*P��9/Vu*R�����eم���e�ݔ�^mh��������O�!.�8��\n�@��<� S���\\��bѶr�8�ȊE(�y��m�+Ď�+�^d@'nE)\\�tW�Z�z·+�/\$DĬ\$8Z���qd�敓ZCڷF�O��N{	Y��J�da�!�sAȭAB��9~�+gJ��\r�Y(աI����M�ՉW\\Svj�c&ޘwE6����ڟG4�@�\$Bh�\nb�:�h\\-�_H�.���+/�7G�pѵ��`�9N�C��\r�3ĘTIQ^�U,�FZ��,�u�@�y�ha\r��VCc>!�3P�`o�09�����a�&j�jL��0R�YȦ�PQi�S�WL)�TL���\nf>A���V�A\0A��7&�\\�{\r����x f��4@��:�;�P\\b�N	�3����zx`aчH\0D��I�����I�Sm�۲���R!!�MYw����G��E�#6qJ~�ޘ���O�r=\nC&��C�i�*\"2�p�c\\m���9�P���]�a�>���£�\ra� |Chp=��?�I#�� ���7���8�k<��A&�3Cs�fE�Mʢ��ߘ�f������5b���	8�͔O\r�0�9��\0w=��1@��\"�r��\$0�ib��#���´�D���d�0��@���\r!�65t�����EL�\$߱J;GDٝ@���C}�ʣ[���h����{���IPe��N��)�\r���\"ϙ�='������T\0r���'��M!Hw���(&��|�8sPp�&��:�pp�r�9�UDO�c\r�4�x�(�*<��0�hS�ڡ� �\0�FXj-��ڞ��Q��h�Gj�}b�����qf#	X:�M���p�X�\$\"\0�(E\\օ�4	�j횦X\$9��X�\n#g���&#0�\n��(p�\"aJ���R����G����4��̟S�n����@�O�}ɸ6ř�,:jp�;R��ς�Y	D�5�)�� \n<)�B���))���/[����5&����hgۅ�j<�v���j�����C#=U�8�V���V���/�Pvm��#8b���)��5m�3�`�R`�I\r3e@�l�	l<i�̴6�)� �9(�p��'��-�J}�Hwh��g�IVE2�VB~��\"��n�N6,�Dճs�tjQ��\r���XR<�&�\r�i����BþMC;iゥu�R���Li�*��s\r���W��Hc\r`��Fp�M0Ei�S�4�h9;�F�A�+'�3\rB�T��0(�iuu\n\\��U�|�>��V�:�0��Δ�H�Si}�w�k��Y:*����\"�ޭ���t����n�dnZ�)YJܱL��Wѭ����A�PMڛZ�k�����b�.g��\"z�>6�nuڄ�bKnS+���8G88���Ju�&WI�)�`cUPS�fVi!�7�t���x�l�%4#\n��Z��tۋ~n�7��A�	V�����_j����n�\r�\n�UI!��P���L*V:|� ^ܔ�x{߇G9ŋw/\\�d�Պ~��J����bMWv�D,��`";break;case"bs":$g="D0�\r����e��L�S���?	E�34S6MƨA��t7��p�tp@u9���x�N0���V\"d7����dp���؈�L�A�H�a)̅.�RL��	�p7���L�X\nFC1��l7AG���n7���(U�l�����b��eēѴ�>4����)�y��FY��\n,�΢A�f �-�����e3�Nw�|��H�\r�]�ŧ��43�X�ݣw��A!�D��6e�o7�Y>9���q�\$���iM�pV�tb�q\$�٤�\n%���LIT�k���)�乪��0�h���4	\n\n:�\n��:4P �;�c\"\\&��H�\ro�4����x��@��,�\nl�E��j�+)��\n���C�r�5����ү/�~����;.�����j�&�f)|0�B8�7����,	�+-+;�2t���h���kV����n�)�(�7?��7cH�>%�c��\n���H��x�q���x�����(K�*-�R�эL��7��,UK�8Ę��MRUcR�WUUeI,#�R���\\u�b�Sj�3�L֌�\"9K�nbc,��p�,#X���\"���\"(�F�J�	�\"_%��.�%��(\r�J�\"1<:ŉ]Ȭ\\�Z���+�]ZF����_�)C�lڰ�#�N}߷�؞\n��C��u	@t&��Ц)�C\$,6��p�<�Ⱥ��V��)	6K��4,�J3��ܿ���tY�67��j4<����1�mP�3�b7��(�/���0�\n+����0�:��@��ªR2�*4MP���:��c4��(�8@ �����s������42c0z\r��8a�^��(]��Ð\\���{��	��?��}أ�Hx�!�\\+7�\n�[�A�h��P98��'p�R��#�'\n�#�����,�s<�;��=J;��j���c�[׌�ӝ>���	#h�ӱ�p����xK���@Չ�B�95b����sb��6�@�MQ+�9��f���O�q���ݙ�晱D\\4\r2�3t��Z�^l\r��6XT�A}\r!��@���>��9���_	�H*X's(� ,��\\�D��GD�	TA�a%�\r?�hP�`1�4��ԯ��\rY�A(@����e!+F�D��w�~͔�\r��p�ù�q�w:�\r�C�ᄔ&�^���;�!�0���&\\�a�E`Ȉz�5��6�U�dڱ�9��4�ՃaV	1&rzs�LA+��0@�ٽ;ʱ:D��EC�C�蜸!\n�9��FL8�ST�1�Cn1��)v�b�Q�86�<�J	� �@'�0��#\"�C�����!�q��4h����!	2W\r*Cpf!D2��Q��S>�}4#6���%���+�Q	���&�J@B0T�\$i���4�O94�r��	&\r!��Q��,�F+��E�Bx\$�]Uu^r�R��X�=�4`�E`�,E�VB�X�_T��JʵY\0CK����܊;�YB�u�t�A��kE�sn\n�P#�p�\\��<d�W��y4� n`�v+��NL�\rh��V���A(��.L0rR��eCfؕ�S�aI��\r�ԏ�.wڅ16������/p���B|f�%I�R��P��Ca�z�\0_��U��0�ڰ�R����4�d��@#���F�\r�2��ߗ���%*������b�r�X҆\rF0�Lݼ#-YM��2��SA�`��C�";break;case"ca":$g="E9�j���e3�NC�P�\\33A�D�i��s9�LF�(��d5M�C	�@e6Ɠ���r����d�`g�I�hp��L�9��Q*�K��5L� ��S,�W-��\r��<�e4�&\"�P�b2��a��r\n1e��y��g4��&�Q:�h4�\rC�� �M���Xa����+�����\\>R��LK&��v������3��é�pt��0Y\$l�1\"P� ���d��\$�Ě`o9>U��^y�==��\n)�n�+Oo���M|���*��u���Nr9]x��{d���3j�P(��c��2&\"�:���:��\0��\r�rh�(��8����p�\r#{\$�j����#Ri�*��h����B��8B�D�J4��h��n{��K� !/28,\$�� #��@�:.̀��(�p�4�h*�; p������E�ꓯS��;\$��K�1T�&C���\"����\0H����BU0?����	#p�3��Z��&f�TMDը#����J�����\0�<�\0Mi[W��+`PH�� gb�4�^I��#\r�8�7�#`�7�`P�9L���a���Z �s=ER#�,R�R+�)W�3�YSV˂(�ꊷ�@�L�\"��s )��ӵ�@���w���1�W�68C�asFZ���#^#��z�	+ \$	К&�B��� ^6��x�0��tbx\n�\0GRh�0MJ���x�3C�\\\"�����xx�U⌀�7����<�L��r�3Z��%� �3�+ˌ�Wi��\r��@���UU��>B�k�����h(�;�@ ���_�Hʌ�������D4���9�Ax^;��r?�&���A|�=�P^ݻ���x�&)�>�TśL��H��n���޳@��{+	��p�Ah�ny�p���t]'M�u]`��r��^v]���D����Q�Q+X�^u(F�7�P��Ck#��T&ī�{<��3�BL	@��TPأR���ő���X 演�\";�||�x3=���jZ���C\"X@h#���ȫBу&?��e��0��2��Y\n (`ނyF �����\0�H��7����3��9�5f�א�v��j ��-`��;��FP�Rh�Xc�g��I4���c�V���8�M�;�V��%�\r�=\r�H�0��3wM��7�@�Ó�O�xrLRGB,\$� ũ\n9[IR0�\nxaI�\"��)��e�\$E��\$��i#z���7@�v� \$���(�\"I�3k\\���jjۜ�	�ȜF�@xS\n�Qb|F	�gy�J['�NT^��Ȯ����(��dBf�Q+!/=s<��h��>��k��<��� \naD&�80 �R2��jOd�@��v���j	�����.&�	Մ٘fj�E���,'�0b���K�%Y�rl�z�N`hi%f��z��Ġզ�� �j�#N� @�\0la��:__���|d6�E6IAj�&!>�T(�a�wT*`Z�1�⩝*]k\rw�!�\\X�ƴ�&�+�=kRdܴ�!:u�Љ+l&�\$Ž��Y�Y;I�V��Вk�1�!�v��ab�F]*KI��0��0ΤbO�2\r�����n��]�;�@Ů�pȞ|��5����XRm����2��km�\"M\nj��>u\"��`EL[2H����h��yE눏����Q�3�Ahh+�<:\0";break;case"cs":$g="O8�'c!�~\n��fa�N2�\r�C2i6�Q��h90�'Hi��b7����i��i6ȍ���A;͆Y��@v2�\r&�y�Hs�JGQ�8%9��e:L�:e2���Zt�@\nFC1��l7AP��4T�ت�;j\nb�dWeH��a1M��̬���N���e���^/J��-{�J�p�lP���D��le2b��c��u:F���\r��bʻ�P��77��LDn�[?j1F��7�����I61T7r���{�F�E3i����Ǔ^0�b�b���p@c4{�2�&�\0���r\"��JZ�\r(挥b�䢦�k�:�CP�)�z�=\n �1�c(�*\n��99*�^����:4���2��Y����a����8 Q�F&�X�?�|\$߸�\n!\r)���<i��R�B8�7��x�4ƈ��65��n�\r#D��8�je�)C֊�мH9��C����ҳ��ҟ>@S�J񌯠�6�\"+R؎Q�!� P�# P�4MI�ގq��95���8T�B�'���ռ(�q;� @10��U�,<��\rz:.`P�7\r�T��\\��b�MMC�5��t4��b,0�`P��2\"��À���kʌB}�9��\$qO\"�@��1t�3|����{�@P�<��'N\$CtI]���N68v����#.5�#X|��Y+y�%zW��}4\$Bh�\nb�2�h\\-�Z(�.ݷ{��T\r*%(���3(P�2��P�5˕��\r�`Ѝ\"CX�9�xt΋땃L�ը������m�D6�-�l�W�ӱ�.���{n�V�[�k�n�\\���`��{'c<.�ç�N��n�v�4�ܑ[�n����s��>��ۉCX���14�R4;8�)�?��	���(�����@J^�7�\0�3��:�pt���\\���%#8^1�ax�7�à���}V\"��i�e��0��:u�'!���5F�	�?J�27G����#d���Z��ۛA��fd�\r5t�%#A� { 9=����s|o�󾔢��k�~*�@���J�>	!�1�T��Z�p�\"�&S\n�t0u1��0F�12�6#Aĸirf\r��7�(I	�:V\"����f�ê݌�n�〜��4�h�!(.��j!���\0��TM�D4��IYy/i������˼!�%������|�G���D\nq�i�@\$\0A'd��_����\nPjh\"A�Z\nx��\n�#�3�!�J��IK��N�b\rA�U! �\\�y���:7I�SH��<�RB��8G� Fh��H�CY<)� ����h����Jc[�.e��6��8����8L�|�V\"��Q8�N��\0A�<�����QaA�+���#�\"F=r4DUȒF(R��>���#5�`��ڞ`v_�^`�7F���<!@'�0���Q=X'��o�Kz����6r��z~��4�p�p�l�50�5�jH��XV((�0�	)'*�|W��G�\"��7��l���7���n��T�d���ttE�wWl0߇3����S�|�� �i\r�u�����G��%BѦB~n	媡次(��m@�Q�	���uW�4��]\\��ɘ�)�Ҳ۪[H��%a: �\n��C�V��Zq\n#t��bU��f����4�)X\$Q���!�7���o\n�P#�qC�` ��F�܋����c�L9YfA��U��	D�)�&5�n�^�J2\$EA�t�wsf`�P\nW�7K)���E��S��K#��4B���fY��	�T�DӺ��\$C4G�3K;'l�U��	(<AN�qNI�v�(!���5�\\�fe���ab2'�Z�	�:��\0�˚^�ʀ���B�y[5f�㑍ꐡ?\0(*p��(�3&�d��k��";break;case"da":$g="E9�Q��k5�NC�P�\\33AAD����eA�\"���o0�#cI�\\\n&�Mpci�� :IM���Js:0�#���s�B�S�\nNF��M�,��8�P�FY8�0��cA��n8����h(�r4��&�	�I7�S	�|l�I�FS%�o7l51�r������(�6�n7���13�/�)��@a:0��\n��]���t��e�����8��g:`�	���h���B\r�g�Л����)�0�3��h\n!��pQT�k7���WX�'\"h.��e9�<:�t�=�3��ȓ�.�@;)CbҜ)�X��bD��MB���*ZH��	8�:'����;M��<����9��\r�#j������EBp�:Ѡ�欑�������#�j���\"<<�cr�߽\nz�(o���h� 2��<&�r7�I8����R�\"8�߭��܉���	�,�\nS\"������Bp�ж�\$�T8���e9�CP�\"�P�xH b\niӸ4�8�3I���/�8�4��C\$2@���\r����)(#T��Z'�P��\r ��Q�\"�X,����u!\$�\nn��6�0:�B@�	�ht)�`P���نR�w�J.�U�j2=@P�B�ނ-(�3�ʩR!P\$U<���b*\r�l�<���1�o��3��1���#=���j�Y�êjaL���p�<���42I[m+��2�#&`�d�ȃ\$Hx0�Bz3��ˎ�t���\$:[γ��z���#@4́xDm�bb���x�CX��@)�\$6'K�B��t7@�<\$#,BN���Z5Σ+��(�q���pA�꺾�����{*ּ�PݵL\nT�لJ |\$���`�M;���zƑhr��۠-\0@3�M*D�ģ���o��n�����5��h�|!K�3�>~�#c2�d.���9�L4���<��e��:�`f�(a9��1�׀Khs\$���9��Py@0�͜��*�I�:2�l\0�k��d���\n\\�z�8��!}�<�\"Ӫ`�x.I\$��#rFO��3����f�)O3��1Ӎ��k������Hw\r�1�effM���`1���ªAHe�Є0��0-,d\$���^��:�y'<֒�TK	q�P/�3��M@oa�~8sD.\r�q�С2�DC� P`��� �,R'��:�B��/i-�,��G�l�>'�99	BxS\n��9�\$B���[ �5���Mg\$H(������BT����z�bUr鐒p�_z�=��:G�	A)d�+�0�j\r@p@`�qw���9`�\n\0ra�(��P�E�A|�ܚ�*D&0p��F�P�ʗ���I�i��0�D%l���E�\r(���p��`+\rh5����Ȧ����Bh�%�� �W�g�QT*`q�(g;��'�D�b�1�s����j8���`1��VT��H��#5����15�Q�CCD>�l�\$@(��9�_��~EI���U�=y��CJ�F&�#D��3�1�E6a~�?hN�C�@��|F	��_���xb�M.�D%b��0K#��\"���a���:nk5J�^&�*\n��d�)⊫�~&�2�";break;case"de":$g="S4����@s4��S��%��pQ �\n6L�Sp��o��'C)�@f2�\r�s)�0a����i��i6�M�dd�b�\$RCI���[0��cI�� ��S:�y7�a��t\$�t��C��f4����(�e���*,t\n%�M�b���e6[�@���r��d��Qfa�&7���n9�ԇCіg/���* )aRA`��m+G;�=DY��:�֎Q���K\n�c\n|j�']�C�������\\�<,�:�\r٨U;Iz�d���g#��7%�_,�a�a#�\\��\n�p�7\r�:�Cx�\$k���6#zZ@�x�:����x�;�C\"f!1J*��n���.2:����8�QZ����,�\$	��0��0�s�ΎH�̀�K�Z��C\nT��m{����S��C�'��9\r`P�2��lº�\0�3�#dr��5\r��Z\$��4��)h\")��ިa�\r�2\rQq��<1hB@9�bdp�����?R4g/\n�@9�P�7��R�p�6����0�b�����F=!��<��HKaX�h5 R�W��\\��b펮C����Ģ�RJ��0�28���P�ލ)k^#���#�`���H�\n�s\n:8c0�u\r�C57͢ė\rKL�X��|�k�Y�a����c\r�D��j��cT�=U\"@�	�ht)�`R�6���՛�B��ŷc�>�Jld�/4C�7�V��ϡ���O�-7C��C���V6\r��WV��h��B�@\\D�8A6��4�� bj� �\"� )��:�=����߭�6���[%����J��\r�s���4N���I�\r��&z�\0002?���\\���h� ���2\r�\rt���{D��A\0x0�8z+��9�Ax^;�r5ܯp\\3��߲�\$wh��A�4���6\rsL�7!�^0���t�g\\��\n|�\r�m�ڝQ{?��;�u��5<���d�87a��?��� hx�!!����ދ�wOX9=���ԫ�|D��{�G-�7>���H1�Q�\$&���٭J�L�\"r��y��m4u\nq�~��ȝP��-\nd�K��ϙ�j�l���fY�j��c�AEO�2�0���[!�.`�N��`:&)ЇHү�P g\r�#�t���bA����!)��n��\"^͊�<1@:8�\"�Y�P��vGAAQ0D��h�!�d��Ʋ���%ѫ�X@�ҨsJ%\n���c�g;�1�+C�S솛���b��wa��܆r�&Ԋ,��\0��FP7���r(�E×l��0�͞��\0��l<�;brM��'�\0�'`����)X\$dK�ra�ѵ<%�S�,��r8��:B	�3t�WM\\�#��B0@���wƍ��r0V�Sp�&̃E�,LO\naP�r@HJ(���6sR��©S��r�RJZ��M:�z�w�ġ#��#�F�Y Ia�:�x�gݰk)�q�\"\rV�I\n!2���Mh�T\n����4i	vv[��d��n�3.���ѯ�n����;W���\$�X:)�6�_�\0�j�,���3�\"U@i4�쿰��	�C`����B��6�J�P��\$�\n�X辬A\0U\n���K�e \$͈��So��0�T8�ɛ3�թ_�HV�+>�bP�R��9(%L\\��1�!!�T\$���I���똋��R=c�@�M +����&�Ȣ�(��KI�=�J������ە����D�KCm:��1��q�3�o(��4��S>%�ݠ'\$�u���Ҁ�]�!��9D���\0`�Vn6��+`\$��Ax ";break;case"el":$g="�J����=�Z� �&r͜�g�Y�{=;	E�30��\ng%!��F��3�,�̙i��`��d�L��I�s��9e'�A��='���\nH|�x�V�e�H56�@TБ:�hΧ�g;B�=\\EPTD\r�d�.g2�MF2A�V2i�q+��Nd*S:�d�[h�ڲ�G%����..YJ�#!��j6�2�>h\n�QQ34d�%Y_���\\Rk�_��U�[\n��OW�x�:�X� +�\\�g��+�[J��y��\"���Eb�w1uXK;r���h���s3�D6%������`�Y�J�F((zlܦ&s�/�����2��/%�A�[�7���[��JX�	�đ�Kں��m늕!iBdABpT20�:�%�#���q\\�5)��*@I����\$Ф���6�>�r��ϼ�gfy�/.J��?�*��X�7��p@2�C��9)B �:#�9��\0�7���A5����8�\n8Oc��9��)A\"�\\=.��Q��Z䧾P侪�ڝ*���\0���\\N��J�(�*k[°�b��(l���1Q#\nM)ƥ��l��h�ʪ�Ft�.KM@�\$��@Jyn��Ѽ�/J��`���3N�����B���z�,/���*��V]�����\$Q+\$� ��\"���U:�#��6O�A9��v��X�\$2���7cHߐ0��R��\0���J��e�T��oi����E�M:Mb��E������g��qO�i6�F芾�N��2z�9���,�A(�C�<���@��X�5�9r��^{�c	����h!p�\$��������^�����5�Sb�.�|H�_\n��~>��\"��h�4���T�2�����[�z�r���>�滯���>6U:�e.x�]�w�A�����~S�\nH�&r�*�&qR�17�\$D�Ao��z�^��F���*�_��|�%����6��@I:�\\��HA|]G��\"�N+};�����T�2tDT��s�Ԓ�++\$�\r�Z�II�U�p޹c\\��9�+�Ī+�,vYLj-\r�`X�O��i���2��Na׀,I�������?��1�d����X��XAaqi��@�0�D7�����x����'�DE�	U�vd��rЅ�L=,).�܋�PT\r�4� ���!\r���CHnN�1�6B� ����C0=A�:@���/��V��#�p��3��>����7�D��w�!����(�DԞ��l\\ʌLE0ݿ�t���ˆp��ƃ��(�x'��b��S���9��|M\r����zPJ)I)�D����WK	\$�%����q�2	y/�>r	)��\\�y���\0��@ZO���\"S�^�	6A²(Ɓxң)I\$��²vh�7I0ǜB�C��vY+�(UXL�i�Rfb�ss�R	>��.� ��\$���A�2�����rP��1�����\r��3��C�h�>�����]���)�6���\n_\0̙�V��b���Qb�@*���~A��\n�&���_b�:-a@\$\0@\n)~'��6�r�IYi;��r��������@�i΀2�z�o�R�a�7�Z�Zý]�!�8'ۗ'������WK���uQj5G�&��@iu�HyH���a�D�S\n�U�>(�\"�RKBS\nA4��C�Z(CO(��4�%\"�S\$w�wo����hDc�Z+��!ST�[��\"�4�Xsz�y&Rf\$ݗE0Q�â1�7�K����4�X�LD݃�BȓL�#g��(3�4X����`�ފ�\"z�	A�*I<�'j� _�@'�0��ZA':�e\0�\n_Qʺ�ĥ����Y�[�tZ��2z2�Ej��4�nHI�\"��4/��OI��?P'4�C�#�WQP��0�0�T �#KM5��1����B��Ւp/��X�*ɀMa+����kY�)eo�̈́H�#Zk�	�-��RKN�!=��ͤ}�!�!g���n��0m�˴6�,k�\"�=�H�<Cėw�ݔ�\n�Re�ٿ\0��C`+a�������,����5��́[���\n��y�V10��+�W�l:9�Ȏ�.��}��\n%5��P��h8)@��أ����{ܨm�^}Kg^�/;�sBvaN�\"1���\"���%}�	bԓ�]@�+�;�CV�)�������:����\r�\$h�Sf`^Qq�\"�ѦS�=��]��-Pb�;��\$�Uq~4Ex��:⊠=��(����գd�u\n\\:�����`�\$��ҷRI�ku\$�0AtŐ�~[=NĚ�-wdH��0aӑ�z�9��x�{{pU�\\�����b9���y�� 8H��4�4jV��ii7��f0�v��;��*D�W_R̦��)�E�j:;��v7fB�f�bfYC��";break;case"es":$g="�_�NgF�@s2�Χ#x�%��pQ8� 2��y��b6D�lp�t0�����h4����QY(6�Xk��\nx�E̒)t�e�	Nd)�\n�r��b�蹖�2�\0���d3\rF�q��n4��U@Q��i3�L&ȭV�t2�����4&�̆�1��)L�(N\"-��DˌM�Q��v�U#v�Bg����S���x��#W�Ўu��@���R <�f�q�Ӹ�pr�q�߼�n�3t\"O��B�7��(������%�vI��� ���U7�{є�9M��	���9�J�: �bM��;��\"h(-�\0�ϭ�`@:���0�\n@6/̂��.#R�)�ʊ�8�4�	��0�p�*\r(�4���C��\$�\\.9�**a�Ck쎁B0ʗÎз P��H���P�:F[*��*.<���4�1�h�.��o���?Q����\nPA�3�E?B3���#0&F	@暹ks�\"%20��L�w*��z�7:\r�Tḣ�4Xʢp�2���+09�(�C���U�l��C�x���^vbR�k4�e�@�9�*��j�Q�h��3��gL,���L�+\"8�x�2\rC��G��sJ�W#-̖/7��W��0����4ƈ�h0�u0\$	К&�B��� ^6��x�0��\nуp�M�I�.p6L�6�����3<�r��>�+�݈o�L�!��P\n�zz0��\r�\"N��3�`�O-#�-08#ς/KL�Y�Cp��R�\nh;�G��Ӕ���eJ�:&q�<��C4#<!߲�еH�(iPy\r`��C@�:�t��<F�C��z��\r|J7�}Ը�Px�!�ٷh�h:��t- �i��9�k{��Sd\0��i�\0�/	T9�pk 8\r,dq��%�r��5�sÿ@2tAwI�u�:�D���	)*C%8��k>�RP�՛|�5�%�Fϱ9gG�P�d��(%Fx1e��\n #MՑ�hBo8��;�bY�@rpA�%+0���j/Q�5f�^�+�6+H0������\r�`Ǚ���#G\"��y!�=�h(��A�z�h�RR!0a̎�@��K:n�3��FLM1	9Dl�B4�%����s��5�r2�u!��\r������\0w&��,�	�\$F3��K�C\naH#@�AO\"�YU���r�a����^GSq,�a���V�C�q0m�;���Q�'�'I�z��J�8�� J�\n!��P�I,�aǐށA�61��V@Б\r������k#�d�H�P��xS\n�t�&�rG�H 1m0��T��z0���x��l�;��b�3Ɍ�n���L�{�&�h�r�k��C�V6�0��q�`��a#\$�ԑ�@�<�;=>��W(�J�*_�*��bz`�!�a50���ޟ���%M|�s�E�zw�l����F�Lka&`!�\0�\n�Y�����RY+ڻ�%(�咖�M5:���6 �0-`73Z���2�z�E��[,�V����B�R#���\$���o�)�J���`���qYTn�W�\r�Pm�Û��q�\$���QHt<r�[�A*�ɆV��U=��()ٓp���%t7�C���S�U\$3�oR#0�'\r�%�b��\n��v�3�Z^\"�j�l���y�\$J�b��F���ղQ�Q=�Z����%M��";break;case"et":$g="K0���a�� 5�M�C)�~\n��fa�F0�M��\ry9�&!��\n2�IIن��cf�p(�a5��3#t����ΧS��%9�����p���N�S\$�X\nFC1��l7AGH��\n7��&xT��\n*LP�|� ���j��\n)�NfS����9��f\\U}:���Rɼ� 4Nғq�Uj;F��| ��:�/�II�����R��7���a�ýa�����t��p���Aߚ�'#<�{�Л��]���a��	��U7�sp��r9Zf�C�)2��ӤWR��O����c�ҽ�	����jx����2�n�v)\nZ�ގ�~2�,X��#j*D(�2<�p��,��<1E`P�:��Ԡ���88#(��!jD0�`P���#�+%��	��JAH#��x���R�\"��Z�9D����\$��������\rӚR� c���\r`ܝ\r�j&DQ���'\r<��E��ܓ,�K�B`޶\"�	Nx� ���S3�4�CPʈ �����2:,��3�PH� i`� P�5,��2�Ic\0��kP(\r5b�4���2@P��nP�#!���2�HM����4zڤ��If*�]Z:�P��7#��X\$	К&�B��*�h\\-�8h�.��y6���0�L�/&�#x�3#i�h��ru5N%� ��.{<6���A�C��c0�6/�9��0�#:2��Wӊ�<�(P9�)���7�f|�%)xܞ��4N̽(�;��P�3rP9h#\n�!��xߍ@��C@�:�t��\$���-#8_\n���\\P�xDqϮ��}��#N\\�С�3�j����^z�4���ݣ��2���\n��P\$���X����n����o�;�R{��<X���0�	�J@|\$���/�ç1�O��\\7��;��%*�T��	���P�,W��I\"����U�)!����F��s}�ɱ�\$��1�O�՛��t��l��H4e�EC\n_�4��I�s&����^��x�2DH@�ZtB��u���8P	B!4*��*T)\rD5\nO`#f4�x8Di:\0M@����cV�\0�,���h\r����k�hn�ܘ�v�fpt��v� Tp�a�w@ލ�S)� ���Q�\\*��:��ZCk�vԜ�`O	i�ek��\$�G�)�/O���P�\$2h��\0��Eɖ����B��]M��Đ�|d�ip�y\nB6�`�8�d�(�kY���G�BF�C?�VI@�VY�n���RK���M�֧���-0k�:It�c3{����h�Q	��3)�\n\0F\n�6�Ǻ�\"����x��g���ktZ��v׀PUu󪑵��T�KU��>:L\\�:����y��Uȭ|�V�pN�0��䢙�C`+\rd�خ@�R�qƉ0)��P��h8O\r����j�%W\r(��N\\�i2Dn��T=K�9	��4�`��[`HD�s4���Q�*���ԕ�qja���6�Y�rY		P�R���}K��\$��L�U��A�4\$��C��ɚ�*o}w\"�j+i�.�����V�9�%�� rα��Slnv�bF�1q.e�)\"��_,Y%ᤄ�";break;case"fa":$g="�B����6P텛aT�F6��(J.��0Se�SěaQ\n��\$6�Ma+X�!(A������t�^.�2�[\"S��-�\\�J���)Cfh��!(i�2o	D6��\n�sRXĨ\0Sm`ۘ��k6�Ѷ�m��kv�ᶹ6�	�C!Z�Q�dJɊ�X��+<NCiW�Q�Mb\"����*�5o#�d�v\\��%�ZA���#��g+���>m�c���[��P�vr��s��\r�ZU��s��/��H�r���%�)�NƓq�GXU�+)6\r��*��<�7\rcp�;��\0�9Cx���0�C�2� �2�a:#c��8AP��	c�2+d\"�����%e�_!�y�!m��*�Tڤ%Br� ��9�j�����S&�%hiT�-%���,:ɤ%�@�5�Qb�<̳^�&	�\\�z���\" �7�2��J�&Y��[��M�k��Ln� 3��X��H�\r���AP0�HRP�+I����2�Ø�7�1Jw)!I4�3��Z���:/�l��N�#�鼩3'1��{4���,̃�	D��D*Jƕ��,2<�iT����k0)=tC�.k���Zw8j�?,���e��Ɣ���������\"����c\\��\"v��R�} \$��i))���1�\\T����TF����%�&�%�l��M��!��	i���%�\"q:��Ŵ� �m����~���4l	@t&��Ц)�B��\"�Z6��h�2aSC ��^<C���6I)D�&��&Fx䴶\"�1�����X+.UC0�k�@��K��FF��l����I��<�e^�J�RB��st��;�p���C�\\3?�(�l���%�Z<�D��\\�y!��f�mɝ?d��I.�╉.��\n�@�\0C#5*:�Oh@ ��k���\0�RTC\$�@4C(��C@�:�t���>Ϸ�C8^�zR��Q��^��Aǰ3��^A�[F�Y��EZ�Qi�+�腸��@ʻ�,-Ɋ�4���Rrt	P�8�d�+f�	���+zwjM�G��S�}���?G����\r�?����T0�0|�X:8\$����јr��6��g[	!Y�.(VÓ�\"*��B���!�US�bf�Yr_4D����(CT��;���\0bB��� �C*�!�O�\$:�a�:�\0��9쑁�:�A+P���y�� �lI�>6:�H\"�LK���u�r1b\$ЪK���H\n�8���N�k8%\0�������+�n\$�رҀ�\$K�02W��@�i=jD3əވPʎCA�K�N��@�ϤO������XP��Q\$D��jp�C�{A��I)CCaz��s�0��hkTD���m!�\"�0�-�Rd�]��)%,���~�[3+.��\$Ã͢VnIy�C�>�!�h0�0ݛ�p�I!�:�Pҵ�TRVϧ�C�C���ׯ��@��S�9_E��#��(��9����cl�q��dKi��(�W��JP!uY�\$b�N1�#阒U�x��8����b�}m�!N�ئ��6O�aG�Y%�pLu��C�?R�+Τ#I�L�}��G��7��݊t'3������>\"����.�b2n&��9�Њ<��^�:����Y�2SY�j�8�_Z{wZ�t���uaS��d��@�]t��ZGX�W�x��(�B�F��j�8��	�\$�H�_�Pi������6+�I��=kĭ!\0W��ZX��bT�{1h���8L�r%U?�%r�nN�U<�,`WVۈE�-\$�x�N#}�\"w(�͒B@���a�8�Ac\$j*i�%��h+S�o&<��L��i���XߜS���?x��.�Y�?	I�������`�G����V�,���C\$��~��|%UYFԤ2�.@";break;case"fi":$g="O6N��x��a9L#�P�\\33`����d7�Ά���i��&H��\$:GNa��l4�e�p(�u:��&蔲`t:DH�b4o�A����B��b��v?K������d3\rF�q��t<�\rL5 *Xk:��+d��nd����j0�I�ZA��a\r';e�� �K�jI�Nw}�G��\r,�k2�h����@Ʃ(vå��a��p1I��݈*mM�qza��M�C^�m��v���;��c�㞄凃�����P�F����K�u�ҡ��t2£s�1��e�ţxo}Z�:���L9�-�f��S\\5\r�Jv)�jL0�M��5�nKf�(�ږ�3���9����0`���KPR2i��<�\r8'���\n\r+�9��\0�ϱvԧN��+D� #��zd:'L@�4��*fŠA\0�,0\rr䨰jj�CR�\\a���\\�5��S5A-Am6'��*ݎ��B�j&@\n_�#N7�Ql���)�қ%�\n��\r��:�BBX�'���9�-t�9L*�������P25�����S[1X��1���pH���:0��S���c�&B�;���B�(�\$I����h��4�l�\n�&&-��^ɁB���#M�-�Mځ1�*%v�seҍ\r-0˂5�e��(�]\\_� р����a\rV� HК��U:\$Bh�\nb�8s�c�d;�UƟ��P�\r���K�x�3&�Z�@q((%�v���#�6/���4��\0ڦNc(�)�s��4S�2�-�uOT�u\"t�M� Y/)�:�\\/�\\�L�E���a�V��ko�=����7l�����Z���m�=F��jN�\0�:S�֎G!�����B�،�m�.�D\r��4��%9�t���@ ��2�4����xA�:4C(��CB�8a�^���\\��Ð]F�z��\r����|�\r&0�^d.��Kf��|MBI=�x����{� ts�E�����q�Dg�9��Թ�+���BLQ%8=���t{i�=��]��|��������E8DhIK���0ޢ��w(a��9���A�T�ض!�p�\n�#e/���!��\0�E�N��s0���oK`l4�޻T>ؠ�K�Y��z��I�#�G��&���V�MQ�:#�MK� OHX�\0��iܡCP��4�\0���Or%��0PS�LD.���L�a5/X2������3��I�Ѓ�HrP������`�'��P�Cq�yfnE�D���@JXۢB:�H9�2R�c�ҺYKi(0��0- �\"�\\c=rI)A#.�仔,O ��(Eܘ����tb.��_�v<Á\0KDd9���GJq5	Fp��&6��[!xG����{�c�x��\r78������e��q8'@�(�k;�%���p�Aͱ�gdu@`�G�#����C99\$S��2�7��Vy�H��%P�PS\n!1��R�O0T\n\0�Ի\$�o�GrQ)�eB�Iy1%��˔�NK^�D�+ih�'v4��T�tMaD�g�7�n�Ֆ`�A���J�� o���ں�T\r��۽�eVC�kD���㪆lj)���L�fB�T� �\"�B�қ�?�6ɰ���^A��6���b��A ː�3Db	aw�̢`�-\n8fè�p��aBD���n3/f��U�f��1pz��������V�(�X�ii\nQAu�N�ep�.юf��w^S/�W��L���&��\rS5��\rCb�o�x��\rYآjf��?E!�A HUR�9Ӏ�))Q5�B7��^��z�e�����܆!��rV�������z��";break;case"fr":$g="�E�1i��u9�fS���i7\n��\0�%���(�m8�g3I��e��I�cI��i��D��i6L��İ�22@�sY�2:JeS�\ntL�M&Ӄ��� �Ps��Le�C��f4����(�i���Ɠ<B�\n �LgSt�g�M�CL�7�j��?�7Y3���:N��xI�Na;OB��'��,f��&Bu��L�K������^�\rf�Έ����9�g!uz�c7�����'���z\\ή�����k��n��M<����3�0����3��P�퍏�*��X�7������P�0��rP2\r�T����B���p�;��#D2��NՎ�\$���;	�C(��2#K�������+���\0P�4&\\£���8)Qj��C�'\r�h�ʣ���D�2�B�4ˀP����윲ɬI��N���2ɦ�;'\"����*�\\�\r�B���tLm\$�ڮ��H�D��r�p1J���s#:O.ڵ>�U][=�u�3(J\n�L���ԍ�&62o�苌�PƁ�HKd��[v���H� j�����C*l�\\n�L�C���a� P�9+��X�UV\\�\nv����+�!�w��6BS �:�M�(\r&P��.�h0����t��#:P�Ό��2au�d�u=H;VR:dC(ݒ#�t��tk�\$	К&�B��\rCP^6��x�0���?*b`�%.��A����ѡUL�)s^�0�Ц�55�@jѵ�w�イ�m�,w�P#��+��.շ�_ͣ�R0�4FP� Y6�T����n�\0�A(���;���pmL���8��� i���4�7t��#5�\"8@ ��=��rI\"������ʌ��D47����x���z�')p��A|1F߁xD{����}�s��8M���MP@�k�uY�U��\\*>cA�S�Z�A=F��͊���S�yO0:<�����w�d9=���ْ�\rψ��> �XƩ�>�bOCjtr�D�hfU922���@b���'E%���jQ�Jo�K;&>��� �(|����&\"�gCa���_L�SU��1��n�Q�))裳c����,%�_���f�O�廅\0��uCĹ�9�\n\n�4�|�2B�)�H͵{�|�b�.䝏,��BO����\$��ȶN��b2�����,~�A���7Z�%�Dܛ1���\"����Ԅ\$P��[2)� �y�*)'T+\"��j��jed��<C̬AijY�2�9�ks=Ā���Rd�9����n�4WC�g�eu�����#�4���vF��\"8�|ʇ��Ѥ��.�\r�&�Q�3��ډ�f:��X@'�0�O�r����lX���%���OI�D*FƔ���u�ڟ�r������ ד�\$M4_��CEBM�(6��L  �d����`LD%t#Iy�\n)K��tH�`Rhѯ%,96�\":�X����\"P���08�ؑS\nV5�d\"���h�l���O���DD'�\r'Lf�Y�@��m1i풲v]f�,*6n��FjN�b\r��1�Z,���]Fu8���Xp�}�1����� i5,�a��f̎�d3�0P��h8�k%�sf�����5A�f3{Rb���İ��#��'\$D�C�y�I⃓F?�<��\n�B�1�68}V�v�`��*a(@�Ha��CϹؚ鐣v���V�	\"�P�U;�j�9#cF<��]'�D2L0�*���4\n0���-��Q|�u����e��jʿ���1���2�W+��D\$Û��fP#�Z���ZWp��E�";break;case"gl":$g="E9�j��g:����P�\\33AAD�y�@�T���l2�\r&����a9\r�1��h2�aB�Q<A'6�XkY�x��̒l�c\n�NF�I��d��1\0��B�M��	���h,�@\nFC1��l7AF#��\n7��4u�&e7B\rƃ�b7�f�S%6P\n\$��ף���]E�FS���'�M\"�c�r5z;d�jQ�0�·[���(��p�% �\n#���	ˇ)�A`�Y��'7T8N6�Bi�R��hGcK��z&�Q\n�rǓ;��T�*��u�Z�\n9M�=Ӓ�4��肎��K��9���Ț\n�X0�А�䎬\n�k�ҲCI�Y�J�欥�r��*�4����0�m��4�pꆖ��{Z���\\.�\r/ ��\r�R8?i:�\r�~!;	D�\nC*�(�\$����V��6����0�\0Q!��X���@1��*��JD7��D�d`0��\n��%,�D�e\"�D�+B�M��1�j�=�#�!�/B:���UH7��()I�X1�S�+V�0�\n�)�7� J2�ҁ6�c��R:+�p�xH�����lz*� �jj�Q̨�1����1�Q�)���\"������R`�,��# ��4؋@Ml��2�bÄF�x]dؘd�6C�S�У�)B@�	�ht)�`P�2�h��cd0��U�yMH�p��S>ʴi�M<U�ݛ)MJ���	{p�#�8��#���`��C�E�pY��	:�����\0�؊`�:� N��ꪄ:�l-j��h�&��X�l��-em[d���0�B��I[\"�`����C�4-S���)Z����iHx���C@�:�t��lF���{\0�꜊��}࿏Xx�!�e����3�pݯ���*��5���p�\$���N����������ΡpA��WY�v�i�����s�w���!�\0�� \"*��\$�E|�C�y���R�J��A'�	�D�RJY�l%�~!����eM��rRa�1�qʓ\0@l^橇B�@�ZZ��Ҝ���Xf3�� �s�!�t\r�����;aMl`�@����\"g��B���z�t(��ACzF��d�HSFl���@����)�����j\rQ�H���\r�bA�j����\\b	V��*p�a�Ah4�E\0Њ��i�b�����r��5�p�FO�P�3B:����8T���v%q\0006���b���)��\$��I�A|t�#�bST#�B\$�3!D%,U��D��x>��\n37E\$�.��\n�+s�aZ��RZq�I��l�ԙ2c`O\naQ�7�C9�:&q�%��m�<gk)��Y���ћ6A�;!��EIi=���T\"P�0u�\$����WA\0S\n!1�Q�M�	9'd�aP�#yכ����:'�JS�A���rS�_��&��Qj�!�,1��C\"d����Ʋ/�M]ZX1\r\\1'\\kkY!���\$d�C`+j1�\0�f�%H\$�\r��SQA[(�/��Hai�O|�1 �T��ՈKCa�\$q���{Nj�E�/&�E�.FQ�~\$\$�/Cpn�9�Uv�-�+L�X�,ڔ�d�RZ1�T�R�z��R�R�]m^\r%�@Ab���W`���B�Y�KFw�� �AM��3�,�<�U���\"�R�02\ni���4��T�x�FV�5��55����6.	���M�0��pr";break;case"he":$g="�J5�\rt��U@ ��a��k���(�ff�P��������<=�R��\rt�]S�F�Rd�~�k�T-t�^q ��`�z�\0�2nI&�A�-yZV\r%��S��`(`1ƃQ��p9��'����K�&cu4���Q��� ��K*�u\r��u�I�Ќ4� MH㖩|���Bjs���=5��.��-���uF�}��D 3�~G=��`1:�F�9�k�)\\���N5�������%�(�n5���sp��r9�B�Q�t0��'3(��o2����d�p8x��Y����\"O��{J�!\ryR���i&���J ��\nҔ�'*����*���-� ӯH�v�&j�\n�A\n7t��.|��Ģ6�'�\\h�-,J�k�(;���.���!�R���c�1)�!+b �9�#cڥ��7K���1L(�:�p�4��t�-m\\��.\\��n�]-i�qB1��Hr}�(f�Lק��k�kY0�A��J2A�LdУj\0!hH���6�Lv�����;��ۡ<&,�i� HH��#j�H#i*G��}<µ�^��8�\"	�y*XH�X�v�BJ�ij<��@t&��Ц)�B��{�\"�Z6��h�2U�U�,>9�c�Ɂ!Y\$ȁ>�-TL��%:6��Tej��IZw�0l�[�'p:V��ĨX�0x{����M�ɭg�QR�D�2Tz@���%\$���4�!ah�2\r�H������u�x0�@�2���D4���9�Ax^;�v���o�3��h^�̃��7�|�!,Y:�}!3�N�1\n]��z�P��z�\$���ʍ���ܻ����޻��;˳�;^۷�N�]����6M������RJ�RI�G�p٪l��o���O��{�Upנ�r	���0P:�����4=�ǽN!\0�4��`@1=���3<Ch�N#4�9>��|C�f��6��ԟPi��@�ڗ� m|2&��C`s@EЃ<�(�qO�xQ�\0�� ,�ej��qjo��x�\0pA�;>��߼9?G�-�0�}`����>3�{b+\\g�����n�������w\r�1�Ƣ�#�=�`1��{,x�0���sR�\$�N�%�%˱&:���nGZ0'�ː^�\\�-H� ��HQ&d�r2DR�2|(6L��%�K���;�Ga�'���.B@Nҳ9���B�N� �l�.I�5���4(�\$�\$�8�I�fZ�2K�LG�5���g�t��F����D��Z����*B�L@Ĳ�8��1����K0*T��sNk{	&�3c��Z5R�n\rsNbahH�3�)C'��9�!t�J_8r}��F��z�ҡ%�IF�י\"Q�y���� TM!k3��`��A0-jB��:�#��W孊�#FQr(��ś�vMdm/�L#R�N\rɁ:m1�^\\�6�rd��x��/YIRk�ln�q1��Ja(�2!�B�S�V\$�2�\$�@��EDy�1�z��5�T�1�%�@N1�޳\\tz��LD�*�FRv�BYԦ�I� ";break;case"hu":$g="B4�����e7���P�\\33\r�5	��d8NF0Q8�m�C|��e6kiL � 0��CT�\\\n Č'�LMBl4�fj�MRr2�X)\no9��D����:OF�\\�@\nFC1��l7AL5� �\n�L��Lt�n1�eJ��7)��F�)�\n!aOL5���x��L�sT��V�\r�*DAq2Q�Ǚ�d�u'c-L� 8�'cI�'���Χ!��!4Pd&�nM�J�6�A����p�<W>do6N����\n���\"a�}�c1�=]��\n*J�Un\\t�(;�1�(6B��5��x�73��7�I���8��Z�7*�9�c����;��\"n����̘�R���XҬ�L�玊zd�\r�謫j���mc�#%\rTJ��e�^��������D�<cH�α�(�-�C�\$�M�#��*��;�9ʻF���@�ޠq������XA���>��e\09O�(�Ø�7ѩ����q�90���\"\r�0��I�%%4��%\n���B(��0���H��a�CRB�Έhȃ&�����aض���(�pHZA�%�#�Yc#���G�`Ę�r�ž�\\�#��b�-cmw	m��� N�Z��jS��N�ۣ8�n�6'���\r�%Yb3����^ 25�u��߭�>6cE�#���.-�c8�:\r�%�\$�!��8Cl�-�9��.��h\\2>�퍉(���3Q�5�x�3(SK��u��Uo��7���F�h�1�l(�3�Β3��X��C�`3��B���j�:�!@��\n�E�㢛��T�P2{�-\n�nc!G.t@x��\n@��C@�:�t��\\N����8^��%:Q�p^��|��x�8�(�0�HR��\rR�鹲���X�h;�]\rC���?��aD�EJ��S�t�7Q�u�p��rݘ]�����r�w�0��\r�����\$f���'F\"�`F��F���<�RC*� ��6�z��@g.E\\앣X�	Cn!�4�c�fɀcw�@sj�^�A�%~C3�C\r��6��ۂ��h�Ӽd�\0c}g\$4��ɸN.���\"�4�����F@ϰfFU��3�혷���\0P	B2��u�ALEȁ�p��T:rd�#hm�R�CM��\$,LcI�����H)1hu��Tf�iwI�q�\"zpCh\"A�3�c�b�aI��7'�v��aL)b`��3�Y��@�ڿ<�zc��|�\nF����|P�Z3��)�J9Y}�9 ���d���0��\"�nH�y4��2%�\\��B�3G��aJPfAd�ʻ\"5P@ci2�\$;\n�a�G\$X5��T&	��J�Y�9��#�4�y�1H9OL`���^Q?�s�U��ݛm:\\��v�S�R�0�	��5�И�`�\n悰\r�ZB��NiS2P�Ų�%����dsB�\n�3,�CV�Щ�m6&�R�G�V];�����RQ����؉�+�A�1��xLi�l��I����ݑy7�H�\$����U\n�����n��_�eOd�{\r���j�nO��b���!����� \$D��\"��O��ۆ�x��Ԭx�i��(�ҊT���!�4�s����_\n����ΦcI84���Eg9�A��Q�&,�%r/khP�����}If2}<�m��;�\08�������S@h�ե;x��4oq>&=fZ%�U��J�<[��H\"�]l�2cuW`k\\a��B�w\rᬵ�;XT��9�";break;case"id":$g="A7\"Ʉ�i7�BQp�� 9�����A8N�i��g:���@��e9�'1p(�e9�NRiD��0���I�*70#d�@%9����L�@t�A�P)l�`1ƃQ��p9��3||+6bU�t0�͒Ҝ��f)�Nf������S+Դ�o:�\r��@n7�#I��l2������:c����>㘺M��p*���4Sq�����7hA�]��l�7���c'������'�D�\$��H�4�U7�z��o9KH����d7����x���Ng3��Ȗ�C��\$s��**J���H�5�mܽ��b\\��Ϫ��ˠ��,�R<Ҏ����\0Ε\"I�O�A\0�A�r�BS���8�7���� �ڠ�&#CԽ4�r�==&²�g'���\$�����3.�\"��H��B�M9�\n�&�c��N�-�Cjr�Lct��&C�2\$�3�<�\0S ��Ztxjq�ʎ'(�֊��n�:�\"��0<�ˍ#C\\:�C(�=l�r:���^&-X�5�]v�Ph�YW&�������\r�k��К&�B��cʹ<��h�6�� �S�)+@捐�ñ)�7��2�7��P��B]\\:�H����M�@���Ƙc5l\r�x΄ab�9*F��KB\r�Cn2��R��;.\rw�d���[�ҋ�ބɎރ�\$1˨�P��V���D4���9�Ax^;�r��%s�3���^�@ʂ��A���7��^0�״(ŌK�%d@���8z[:�)���?Ґ�8Wc+��hZ&��iZf����n�j���7k2�=.r��	-[0܎�6�*�#@�BL��S��)F��T䐤n`4�T\no\r#6X41�ǯ(#�/d��Q��<�0g�.��VN���2JѱɊ:uh��\r0L,\"��q#�Kt������\$\n	�u2֮Rt)J�[	-e�z<6h�L��2�e�p�	��>e60�����(1Ɣ��22���A{����V����1�V:�A4)����W�)(!)� ���A\$��_,�m8 y��[+��\n1�m��:���NOH@�EW�S)='��!���Hk(T���LA;P�L9��Pi	��!Ԙ��y�k5q������c�3D�����O\naP����I'&'�\"*�\\�9B.%<I�dN�hk*<���IB� �G�lL�\r(e	BĐ�BdJ�`��0��9P�\0�:ȕ ��j��?��L�S)�:��?E�5�ܥP!���Y�R|�%l�2�B�P	kJS�J�\$J��JR�|6��ZC,��; ��g�w�U3Ѝ0�b�L`*�@�A��g����`̡7�K �����;uFu��SL\\��\n���XH@PRUӬT�t��fML�U�O��A.�Ȏ\"`�`�(n2�����`o�a����V*�7�H���H1�LAM}ϗr�\r /F�WW��D�TϢ&�;���6R<�+�^��m0:���\0@�s";break;case"it":$g="S4�Χ#x�%���(�a9@L&�)��o����l2�\r��p�\"u9��1qp(�a��b�㙦I!6�NsY�f7��Xj�\0��B��c���H 2�NgC,�Z0��cA��n8���S|\\o���&��N�&(܂ZM7�\r1��I�b2�M��s:�\$Ɠ9�ZY7�D�	�C#\"'j	�� ���!���4Nz��S����fʠ 1�����c0���x-T�E%�� �����\n\"�&V��3��Nw⩸�#;�pPC�����Τ&C~~Ft�h����ts;������#Cb�����l7\r*(椩j\n��4�Q�P%����\r(*\r#��#�Cv���`N:����:����M�пN�\\)�P�2��.�c�ʍ\r��Ҷ�)J�:H���5�\n�-\n��1)���)���\n���Z\\�EB*�N�S\r\n��9�P�\"���#&�p޵\$����Ӭ4',��0�������\0�<��MGR\n�<���xH����/�:�7#�4'���6�pЃ<P-}Z/�(Z���z�'����0�Ʒk���/Ԙ�]�(�@�ً�]IQ�}x�Z�:���(�v7�B@�	�ht)�`P�2�h��c��<��P��7���=@\r3\n69@S �\"	�3Ε\n�L��\"���ތPˎ�c3���=�Ac@9cC��i-'X\rӠP9�/�	��dr:7��r���Ɩ����ՌҪP�ɘ0Y6~��C�@&D�3��a��t���\\:�ʴ�z*��cv��}��Cp��}�'p:B��1@Ó3�,�I�b�P�z�*�������HOޯ��z�:l;˳�+[m�pݷKȬ�ׄJ0|\$���AEo��G�B��c�ླ��@��h����<>2����\$+�>��ʬ7�ǹ���>�.����H�0�ܫ���A�ρ�:\r\rGD�cs��#������)��!7a���'���H�B�H\n�80�\\�8((����3�A%��(��\r	�\r&p�����5E8�\"P��DC)	i��a	��\$��%PfSq�F�1��`���\$10�8���{�\$�)� ��L\r'�p�I�l&F*��c����\$����B��#�T�=�X�XJ\n)\$,<�b�Oy\"�5�C���P! �����Tբa%l�ᚈv}��D�Hy\"5��O\naR6�(�@�\"`IQ��r-\"c�1HK��I�g a�Z%\$����%4l�p�c\0S\n!0��^��yj4�C��|4��AɉӢ�S��:L��9#����X\$�97)�;�PoJg���G!�a��H�QV��\"�H��b\$�7	��2� T(��%�h�\0�r�`+�d5��Kl�}MX6����#A������T��%cr^��-Re��NS�z�K1���A���	͂s�DLQ�%��\0��^�0y]�I� �#��0�ִ#�v֛\"-t��Sr�L�6/�&L20�\$+�\r�V��CKYBe��=6���B��~0T�P�2��mL[.,!���C!̌�MS����\rRV�˝�Cv������=~&�a��";break;case"ja":$g="�W'�\nc���/�ɘ2-޼O���ᙘ@�S��N4UƂP�ԑ�\\}%QGq�B\r[^G0e<	�&��0S�8�r�&����#A�PKY}t ��Q�\$��I�+ܪ�Õ8��B0��<���h5\r��S�R�9P�:�aKI �T\n\n>��Ygn4\n�T:Shi�1zR��xL&���g`�ɼ� 4N�Q�� 8�'cI��g2��My��d0�5�CA�tt0����S�~���9�����s��=��O�\\�������t\\��m��t�T��BЪOsW��:QP\n�p���p@2�C��99�#��#�X2\r��Z7��\0��\\28B#����bB ��>�h1\\se	�^�1R�e�Lr?h1F��zP ��B*���*�;@��1.��%[��,;L������)K��2�Aɂ\0M��Rr��ZzJ�zK��12�#����eR���iYD#�|έN(�\\#�R8����U8NOYs��I%��`��`P��9-��Ap8�T���X9Uc(��\rØ�7�15��(�G,���2���H��#`Q+�D��yQ��Jsøs�QD��[V�R�%\ns�et]�1H\"C A>����r<N�Xa b����!8s���]�g1G�������[b\"�E���t�%��E?4��U�%�\\r����]/J	g�'1n]���0�I�2��\$�7��AҘ�Ii:Y~��M����y},EҔ�=���u1��0�c��<��p�6�� ȪX��?e�����4�\0�95�x�3\r�H�2��]�|]P����7��h�7!\0�\\���܎c0�6`�3�C�Xݎ\\��3�<PA������P9�5��ɐ\\��*50t3U��t7�\0�2w|X�׌u�t2A\0x0� ��C@�:�t���>��X���p_\nU�v��>��px�>q���nG\n�l\"pO� ��8� �5ȭ�HXW��:�3� R �Ḧ&���\0sDH����\\\"%{π4>'���C�}��;�����r~���+w��/ED��\r�m!���W� o_F�9��kJAiņ���h����b|\"O2�\\�f�xS\n�S�5��1��x��u����Z_A�3B�4�]2tΡ�:�\r\"N!�\r�9��9�a�0���s�2F��#��A��,���\0�\n1Fh���rC�AQ!��[�(�V���\$�		W4�4a\r^8�Mٯ6&�ڛpʾ��r���!t3+]Pw��2A8Gnn�\0sD�۠c�ppw���0侃��a�2�������F�1���h�Sjt�\n��F�-�A(��c��5���GRE`	�6��+�4�D��&��y2�Г�lhCZ,B~�+\"L9EK��SQL��A\$��J�5�e	��qMӄ!�ܡ�̂�k҈�v�`�ꐔ�������T#�䘬�PI��&����E�L����Ĝ ��O�#Br �h�j�t\n�Z��}>�I��ʯ\n��4�U�T�\\���)��4���`�fv�];z�\\�5h1���༄�����6�Y*]�]��;	�h9���������x����X�B;�A�j������k��~\r�������b|�V���ci�v4���p�k�C4I�P��h8U�f�=��A�\$�|A�խRK�\$D��� �	X�,��2�hM�L�:h�N�q3K�\"XQ�9́�2�X�A*JI���2d,��#��.��%�_��|Ls!�Y�2�r/�Y�#����zO�8�1��Tg� 9��i�m���V'�0�_�]P�uJG�WK�����.���cY8�Ø�T����lr��C	�Q&��  ";break;case"ka":$g="�A� 	n\0��%`	�j���ᙘ@s@��1��#�		�(�0��\0���T0��V�����4��]A�����C%�P�jX�P����\n9��=A�`�h�Js!O���­A�G�	�,�I#�� 	itA�g�\0P�b2��a��s@U\\)�]�'V@�h]�'�I��.%��ڳ��:Bă�� �UM@T��z�ƕ�duS�*w����y��yO��d�(��OƐNo�<�h�t�2>\\r��֥����;�7HP<�6�%�I��m�s�wi\\�:���\r�P���3ZH>���{�A��:���P\"9 jt�>���M�s��<�.ΚJ��l��*-;.���J��AJK�� ��Z��m�O1K��ӿ��2m�p����vK��^��(��.��䯴�O!F��L��ڪ��R���k��j�A���/9+�e��|�#�w/\n❓�K�+��!L��n=�,�J\0�ͭu4A����ݥN:<��Y�.�\n�J�M�xݯ�Γ��,�H�0�1\$#�����5�),\"��҂�dW6z,���: m:�S�<z�;�-[J*���Kյ?]�r5�)�jATUN�R��P���q�)Q�}e9��u)2�(Ȓ�j}KO��Y�! j��0��i�R|{\\�Z[d>/�	QH��i��I���?;�m�r��ץ��ď�4\$��T��oq4!ҁf�S��|�����`rҕ!Q\n��3)���-9�x�5�r���;C_80e��%��ۺ��ZA�au �{�u�����f�P�:\\2t�\$�Ro>��.�{׵4h�P���ݧs�C�)W�;zcʒ�\\a��W�[�P�yu�W�5�KY�:��]��܎苌Z�g�~֒�N��X\nVp�A�ډ�^�5J��(���4���PP��8ύ0# �4��(�*�������]K��3Zuc�[�<�����I:䀣���@r��� ��p`�����pa}������8/���@��t\r0�� |�M��7Dx���*e��/ �m��~M�v;�%�1���b�zdy�Q!\0[2c])+hR�Z�5�1�6w8��;��]�+���Pz�p	3w��A�J\nAh1�������	�D*���<HV�,E~�9̒7b^ �7pYT��X�`�Tu��>/v;GF����6	m�)�Ju���\$�y&�t�n�9&|*V%�Vb�!�9)���c/.�1NN�Q�e�Ջ�}{l�����a�ijU ��N�b|�6pI=N��b�g� ߰f*���,��Y�����Krxu��A����%��\n\n�)4��r�ֹ4S��!��̓�JY�cy5��Y(�Nu�K�K������6��\"K=%+)Q�����1����L�\$���J)���,f��:�ThC\naH#?H��P��h���ʂ\0�c����E�7[3aA�:a��hۣ��AS���iU?:g)Y3������U�ZPɧ�)�j'pb��P�J�8�ٴ���w�R�R�zGG%MkU�ko)��W��+\n�����X#��,��d�^b~xS\n�B����`9O�.�_�XU;�_D�%\\�&�)XTt&��S0b�1G�����7H��њ���(Μ��(��h�3N���e���[�	tG+�*��b�`��������r\$��g��U�⒮����!��`�\r:˷�A+y�S�K��R�۰l:�V����0Ss�֖-)V�~3�G�c�K�+�M@^\"��ɴ(�Z)v��i(7Z�r1ھ6h���L-�[KYs)�˙A�D�_��a�l\n�R���ߗ0}\\j�]0�KEYQ�3�����wZտ_3��Ңߒr���	�!�rk���O\"�?TK>����]n�e��.{=q�ٛ�=]m���u*�ϑM�/o��L4�VR��La1�Y�ט�u���\"�w���(��\r_����F\$\$�8��ٴ5�2�U�9���n^�\$Kg�����w(IJ�j3P,}~)�,�򁃩vr�ƭg�cL�\r@-�~=M�İ�*�e(̀";break;case"ko":$g="�E��dH�ڕL@����؊Z��h�R�?	E�30�شD���c�:��!#�t+�B�u�Ӑd��<�LJ����N\$�H��iBvr�Z��2X�\\,S�\n�%�ɖ��\n�؞VA�*zc�*��D���0��cA��n8��k�#�-^O\"\$��S�6�u��\$-ah�\\%+S�L�Av���:G\n�^�в(&Mؗ��-V�*v���ֲ\$�O-F�+N�R�6u-��t�Q����}K�槔�'Rπ�����l�q#Ԩ�9�N���Ӥ#�d��`��'cI�ϟV�	�*[6���a�M P�7\rcp�;��\0�9Cx䠈��0�C�2� �2�a:��8�H8CC��	��2J�ʜBv��hLdxR���@�\0��n)0�*�#L�eyp�0.CXu���<H4�\r\r�A\0�<�\nDj� ��/q֫�<�u��z�8jrL�R�X,S���ǅQvu�	�\\����:ň�H�\r��BPp�JR�\r3K����2�Ø�7Ԫ	�U)q:�A(J�!a\0�eL��Ӛ�u��YdD��E�TjLŝ��u�@@���yE��}�G1h9[U�/1NF&%\$����1`���:�PP!hH����Y9��EBbP9d��P�[�J��b�0�!@v�uy�T����Y���vHgY<�?I�XXl�\$j�4�㥥���u�I͎ͫd�2�e�����XM�Ptu�� t��\"��\"�Z6��h�2/M�w[r=�b��E�T�6��%���u�4{DչGa�S��e��6A�B��7�h�7!\0�R���c0�6`�3���Y1\\h�3�/�A�f�K�:�a@��[�7���S��.�j����&\n�G5�#52:�ϰ@ ��k���QS�x@!\0�9�0z\r��8a�^��H\\0��|'	�}H����S��xD~�����/ ����6!HI�\\K�Q�A BD��o\0��Tb�l�f�����aE��#�i{��뽗��^��|o�����hnA��?'�U����C��\r��:@��He��7����PkC�����pt���r�a��:d	T�r�%V��&������c~�p��bC��9<`��HaЅ�'	��sNq�覘�BRq,8WHa\r��#C�q�K�5�@\$��p(*���'Q�.Q�/�l��\"�G�:V9A\rTC������4�E*�*�E!�:\"\$��z\$�Nh;��&^�D/d9��&��lS�a�8:�A�(r]!�4��Pg| �AI�8���O(U�A\0C\naH#a��	�Ķ:�QIق=+�6�`(�F��\0:�Q��̤�X�I�,'\r� ��/��P�SM0�G��Q�H\0PI#��7�T:WJ#D��+OTB��uD�3!����֝H41��7&&�,�(�3^5��XRc�!X�5�^�0]\\M�sV�4�����B�X#�r����NޔT:�Y�� �)��A�u)�*\n�;D3�!�V�ZK�F���7���m�%=��͉�hN����J��X���?t�;�1qW�=�Ā11-p�qD+z�ƣ@h�d�9LћK����Ӻ���\0���C`+���5���C���S%��P��l\\(!?����\$�t�T*`Z������A`L���V�P1�2d�i�68�܆��M�7(���p~��?\" ��h �o3&lΧt\$�F/�E���F.k��\\Bv�������e��E�#�1Lu�v�6�I�+2<9}�������30%8��)��'��U�!&p�ulka� ޘ�Q���VJ^��g�%s�kxG�Z��f�Ȟm`�R!���4�dM\"�0��ڬ\"T�J\"6";break;case"lt":$g="T4��FH�%���(�e8NǓY�@�W�̦á�@f�\r��Q4�k9�M�a���Ō��!�^-	Nd)!Ba����S9�lt:��F �0��cA��n8��Ui0���#I��n�P!�D�@l2����Kg\$)L�=&:\nb+�u����l�F0j���o:�\r#(��8Yƛ���/:E����@t4M���HI��'S9���P춛h��b&Nq���|�J��PV�u��o���^<k4�9`��\$�g,�#H(�,1XI�3&�U7��sp��r9X�C	�X�2�k>�6�cF8,c�@��c��#�:���Lͮ.X@��0Xض#�r�Y�#�z���\"��*ZH*�C�����д#R�Ӎ(��)�h\"��<���\r��b	 �� �2�C+����\n�5�Hh�2��l��)ht�2��:���H�:��Rd���p�B\"l�.(@���CZʧS�@����7%#}�\nn[�K��5�+\"\\F��l�-B��8?�)|7��h�4�3[���\nB;%�D�U,�Z	�i{0��PJ2K��5����%�`XC��,�ˁA b������*������:�T�4��(��Xq�ȔV�P�:<t��\"��t^1���K���UN4���FἮv�6�I�p�.�f\"����	�c��0�x��ƁK��r�@t&��Ц)�B��\"�Z6��h�2^W������*��+��̨�3�b�2я��4�3T�3��ދ%s�A6\\c�ώc0�6-�z�D�8�<�B�\r��0ڳ���P9�) �b�i{��;�*7)(b�2��|�*2o�^3O�t�#&��[��E%##�� ����D4���9�Ax^;�p��jc�\\���z���B;E�}⿳0x�!��5rA��)IR�c��bS}`�D,�Ì�f5\$i-]���t ��|�_]K%�u݇e�v�����w���5\n��Hny\$����q�=觤�j!�l�� ��}�	q�MT��\"��XyVƝr���!V����*C�>���6��e`�rs�/,\0����l�����H�x �����bR� g�BX�9md�A���\\b2ɐ!�.�����	u�\0��eDH����(P�͚df��zAh\$���.��a\"����c���1\"-��EW���}_h5�%��Hc\r\0���w`�L��2��ه6����e;�l!�0���-� ����q�d�D7\"K�*]h�A���Y\$\n���1VJ�-%��4�EDXj;E���\$vv�6|�r�s���I!a��j�\$y.+\0���C��AA����9\0]<�>���Kh�j���\$�Aӗ�h�O\naR4`�cA\0S��s��If�'D��5����J�����P��+� a�T�W�ä*CD��O�h}M\"wm�`�ZRBa3�TͲ@�#��X�#t7B�mM\\�#J�B.E��%��ȉ(���Wez�\n�\rk�0h9^�z�Wu��*��ƬQԮ���vGbV�1��@/@�\n�ia�=�VH�e	�R�R����=�r�� �'B�T��'�FMN�\$�5�鑢8SY�Q�x�\\b:Ů�Gw4���\$H�aK����S�\\�{Ė���K�l\rI��ڀ�T�y+�E���Hqc-��S�_M�� %p6�̅|ʾ�\$͹,RO�d� (&���d��,8Vz�K��UA�\r�Y�l�y�M��/�_�M�YX�͝�6a�z<ĉ���J+*������(W�)���ļ���0Z�d�2dcDt8�";break;case"ms":$g="A7\"���t4��BQp�� 9���S	�@n0�Mb4d� 3�d&�p(�=G#�i��s4�N����n3����0r5����h	Nd))W�F��SQ��%���h5\r��Q��s7�Pca�T4� f�\$RH\n*���(1��A7[�0!��i9�`J��Xe6��鱤@k2�!�)��Bɝ/���Bk4���C%�A�4�Js.g��@��	�œ��oF�6�sB�������e9NyCJ|y�`J#h(�G�uH�>�T�k7������r��\"����:7�Nqs|[�8z,��c�����*��<�⌤h���7���)�Z���\"��íBR|� ���3��P�7��z�0��Z��%����p����\n����,X�0�P���A��#C��>�c�x@�J2��+J�(��ɂ�Ĥ��䌁B*v:E�sz��4P�B[�(�b(���zr��T�?���0���P�禌0ꅌ�(��!-\"1Ro��RX!hH�A�!� Rw�j[:\nn�&	\n\$���Ҷ��+9D�R-b1\rC(�A7���3�5��:F��_�C,�\r#Boh>\0S�ك=h\$Bh�\nb�-�7h�.��hZ2�Uu^'O�6C�2����r7��2�7�(�k)��?2��(9-��	�N�78�C�Ϸcf!@#xrr��ab!]�x��<\$L���ư��H�����x��0���\$�����j\n`�3b�'�\\�#&s�YV8��1�Ag�a�4C(��C@�:�t���(���=�8^��\"Ҋ�+H^ڀ��%��^0�͓��9�����Ra�T#�C2�ڒ�ֆa��c���ڼ�����l�6ѵm�v���������7or�}1x�<h��q�\0� r�B��=�0����\r�2p�>ɄJ9OV�\\���4>�Ƅ-!\0�]����3=��\"0��x�D�cg�9�`�G�ɩ~A�:�}Љ�y͕ì��!p.HP߽�lo`�!7a@\$j�\0()@�l��NR[�*�Y�x@��٘ �\n��^Aɉ� pĝ��~��{�l����\0�y���E�B��C�\r�1��r�SAIO����K{�'��!�0��Pi*&�'f����h�����F���h<cѣ�(�=)%�e�ґd�b##��dq':�0�Q d��G#�c��|m]h#`�L8 j����x��[�{	�ݛ�O\naQj�G���0u�,2�5vs�>hL�I�*sz�6�%2��^\"�X��T��Q	�����\"����2�*Bdhm!��OFY8�fITY�u2,��RbE&�)��L�A��\n1*PŰ�\"B�5�2���K�dh|6��[C�f��g�F��W HftȀ�J14N&��#@�0-��dIE���L�{v�J�5�Ğ�&�uU��M@:��p��\nc��̴)����\"K�Q����'��#������+ZrM�Z2Yi�2�C�P���OGF<�*�DZ0rYJ�:�#Iz�j(Ƞ%N�Wˢfdҩ=�@]m1�0�D�ȵ�j��";break;case"nl":$g="W2�N�������)�~\n��fa�O7M�s)��j5�FS���n2�X!��o0���p(�a<M�Sl��e�2�t�I&���#y��+Nb)̅5!Q��q�;�9��`1ƃQ��p9 &pQ��i3�M�`(��ɤf˔�Y;�M`����@�߰���\n,�ঃ	�Xn7�s�����4'S���,:*R�	��5'�t)<_u�������FĜ������'5����>2��v�t+CN��6D�Ͼ��G#��U7�~	ʘr��({S	�X2'�@��m`� c��9��Ț�Oc�.N��c��(�j��*����%\n2J�c�2D�b��O[چJPʙ���a�hl8:#�H�\$�#\"���:���:�0�1p@�,	�,' NK���j����ܠ���X��3; �\rш��6��J.�|�*�Ï>��\0ұF\"b>��\",��Q�%n��6�B��1��BH�6;l:<5\"�|�1\r� '+èt�J��C�V�im#�2;@��ZvbI�����\n�)�k\"���P �c�D	v؊����+7�Ì��ԡT/�,ner2����Kd�W	M�p�ʛ�|�)��:�B@�	�ht)�`P�2\\hZ-�X��.�R�⊣�-�i9�`�F�(+��\r�0̏/i�����P�4��̦��<����1�i �3�`A6/C�����*(�Ҩ����ꕅ�R����6���#x3��c8��c4�:�38@ ����9:#4��\0x�p��T���Ax^;�rc�!�r�3��_\0:����A�0����^0��^�q\nXٸ�|���<�僂�2�ʋ5�l�oD8�WS����8J��]�p	�qW;�۪���|�������J�|\$��p�1\rçE�N�b7�-Vz0���D��ɘ�h�zO�#eR�h�\$\"G�0T ����@x�!F~�ɷ\$�JCf%g�F��SL(��ؒ�ԙ,h�}����K��P/y2���P \n (<eIR�=���pPUZ�\ne�����O��4�@��p�\n��@p0���`R�*%L�4�]�&ua�85�D��!)��L3��`���A��Sp��Ix)� �O�[�]Ĕ:�S�A�'n���l�^�6'�'*d���I�\$h��?�@��AM蔚��(L��o��-��RlM�.!ԣ�\0�S	�tr=P�K��&6h(�P�T���F2TK\nYM�˸5�&��%K�#�Y�C��W�r�\$l�'¦ރr=�9�G�1,C5�����E ��Q	��)�0�u�0T��l��T���ad��J�c:Oj8ͤ\$�uLG�S��>���O�A5W,����OH��_����J^i	5l�6����8A�\"��\$L�T�9(˄j\nN�,j�T*`Z{zM)���+�1b��ErqAu32�\r!*�Y\"�+HQ��>HL�G��24\\sk�\r!�<�v_%���\nDvz�bF��r7��,�Ec�P\"O��ʈu�#��5`�L�v?��Zrbw�PPjIL�����.I�U��\nɑa��~��\"���+UA}���C@PEx�F����̊�!g\no����a�#�()\\c�RQS�(��";break;case"no":$g="E9�Q��k5�NC�P�\\33AAD����eA�\"a��t����l��\\�u6��x��A%���k����l9�!B)̅)#I̦��Zi�¨q�,�@\nFC1��l7AGCy�o9L�q��\n\$�������?6B�%#)��\n̳h�Z�r��&K�(�6�nW��mj4`�q���e>�䶁\rKM7'�*\\^�w6^MҒa��>mv�>��t��4�	����j���	�L��w;i��y�`N-1�B9{�Sq��o;�!G+D��a:]�у!�ˢ��gY��8#Ø��H�֍�R>O���6Lb�ͨ����)�2,��\"���8�������	ɀ��=� @�CH�צּL�	��;!N��2���\n�8�6/˓�69k[B��C\"9�C{f�*���h\n�/#\n,�0��@7 ��4ܪ	��8�R�3�����p(@0#s(���Ȣ�s�(J@P�<��Z2A��@����K>�P�0�H����^�\0H�)ۼ4�C:6�*\0����\0�5�O(�	���@T6O(Z8\r��#1@P�4������#<��54��fAjR:��(2��\n���%B�X@t&��Ц)�C ^��m5�R���d O�A M���c`Z4'c�p,�� ���5���(T��	� �[��x�Q�*��c�9�è؎9k`�3�l0��*�J\r�fF2��R����)7�b<�R*\r�Z��\r'#&���Y��7F�x0�B|3�Л�t���1z����z���jg-�}���x�!�Ra�[��������7A#<���\0��Եܕ�#��@�W:�r� A��;^۷�������ٽ�[��4�sh�¨��6��_E!\\_E�#�LҪ��Rvձ���)ww!���qj��5c�x:���FR�l�\"1�j`�MaEa��\"�(C2�e��9�d�� ��4'��\n/��P�[�yq.e1��fʅ�<#B(M뾥��H\n\0��u�FAE%4��׺R˛�c�\r-w��ɓ';a�-����*\0���bz��*Dd�6��s>��`�F�\nu�H4��Zgm���Z�I)-&�ІFa�����2��l)��5S\"`��?Kd����bd���\$��:'���a��:��r%!\$���*@��T\r��vAh�O��u>�83�b�[�=3%01��-�\0.e ��H3��\\4�P�#d{�N����4�`ng�ʗ�OI��tG���֖�0g�),&��O��LjF8��\$G�7\$D��L�L����f���PFf�4��r�����x�%��bˡCg`�.�?8a�3\$sy����9�(���\"��4&D%r.jnP߽:���!�0�\n�Z	!�ӗF>_���]�a-��d�M;�Gq�P��������MT��u�f��[O�QC*u�9.��?ʤ�Y`��d�)�7\r~B��_��l\0(��x�/�8�)�Fѥ����]S�IK6��9��\r��0-�c�	�'��6J��Up�X+�έ�ZPO����~\\+���6�����u��v/��8L�Pe";break;case"pl":$g="C=D�)��eb��)��e7�BQp�� 9���s�����\r&����yb������ob�\$Gs(�M0��g�i��n0�!�Sa�`�b!�29)�V%9���	�Y 4���I��0��cA��n8��X1�b2���i�<\n!Gj�C\r��6\"�'C��D7�8k��@r2юFF��6�Վ���Z�B��.�j4� �U��i�'\n���v7v;=��SF7&�A�<�؉����r���Z��p��k'��z\n*�κ\0Q+�5Ə&(y���7�����r7���C\r��0�c+D7��`�:#�����\09���ȩ�{�<e��m(�2��Z��Nx��! t*\n����-򴇫�P�ȠϢ�*#��j3<�� P�:��;�=C�;���#�\0/J�9I����B8�7�#��H�{80��\"S4H�6\r����/ڲ����?.:�1O1`�>T�< �p�4��Rl&+.��o����/�>����;�E�nhº�k�Y\0�cUJ'>� ���ȓ1c������Wu�rʎ�R����PH� if� P�=�[� ��b��pc\nR�� �ː]���ajz4��0������;d���,�M��PM�L69�(�[����z�N��qf!�^��,<��8��D� ���\$	К&�B��Bch\\-�︺\n}�^M�h�1<�*�σ0̑C鰧����P�m�E�ih��7#Ѕ�L��T/��0���9�8�[�!�R�H��������&�����<���Yg�쳚�|ŶѴ�A�W��:�[�&:��k���쓎�:qW�������c�m�p�6�����nZH�v�T1Lp��2n�>�Ǎ�Ӻ��|,L��420z\r��8a�^��]{����3����j\0�F\r�xD4k�L��x�i�(�PC�y�y�6���XiB��R4I��)(4@B��J�C脡@(,���z�]콷���	�|�Y����_XeQAE���T�\r!��� aS�e	��0��\\�e)����_Q�M(�BXPb�)����2��H2|L�:�20��Hw@\$lB!���҄�a&@D09c�U�a̥�0�AC�f��P�h���@A�S� �d\$?.��9����(zD�:\0��.׺.r�\"�A�j%�ę�e\\��&	��\" H#�.G�=D��.AAP-�0 �Fu��؁�@��HH\r�A�b!�8@Hry\rN�\\�H�KM�\r����h�d� �:C���j���-h5�&P�@ik�H4�w��Ė%���gCJj%P�3� S\nA7Lk !(r? �\"�	�N�۳�P��Rq�H���zO�A\"JA��R��wG=A`�Bᯙ��ش�\rYLJ4�'��^:S\r��4���oB���1��I�s{��z��V� oJ�L���R�[_\r�ձ��&IѶ.�B#�P@p5�t1���aj)��=�SRLrD¤�@�G)J��95u7ˈ �P(6	D�Ҝ;Asmѐ�l���BE���R�U!�[�io\"ȂuA�����%ŷFM=����96��<��7\"�Гx�wu����`��~<��u�M�b\r��5�R?H)Mv�q<��8�r\nq�)\$�%��keJc�-������_r�@Q|*�@�A�6���[�la��+��J�o`����O�D�ǰ���w�,Yl����7��F+��DuW�V�y��g���Yn�}�(�̂\0�\0�ª�5�0�sLj'��6��7g�wm�wu�H����r�9��\$k6'����@X�:��{%B9�:���L�\$�L<��e��L�wA&�C6UWE'X��Z��Z�Zԁ}A�5��9��lk�b�U���)�.�)5H�";break;case"pt":$g="T2�D��r:OF�(J.��0Q9��7�j���s9�էc)�@e7�&��2f4��SI��.&�	��6��'�I�2d��fsX�l@%9��jT�l 7E�&Z!�8���h5\r��Q��z4��F��i7M�ZԞ�	�&))��8&�̆���X\n\$��py��1~4נ\"���^��&��a�V#'��ٞ2��H���d0�vf�����β�����K\$�Sy��x��`�\\[\rOZ��x���N�-�&�����gM�[�<��7�ES�<�n5���st��I��ܰl0�)\r�T:\"m�<�#�0�;��\"p(.�\0��C#�&���/�K\$a��R����`@5(L�4�cȚ)�ҏ6Q�`7\r*Cd8\$�����jC��Cj��P��r!/\n�\nN��㌯���%l�n�1����/���=m�̷�:��%�D꧶P��DÚ��'c2�\"�+�Is��8�\$��\"Pӽ.t��	�\n�I�H#&�G\"p�;#2�>�!� @1(H�Ղ�-��A j�����B�l1���8�ce���`��/bx�3��0�4� P�6#�^1�lx���J�\"K�\n@:�ː�7+�����n5h��)2P�FɽgW #\r��_�\\��#:��@t&��Ц)�C ���h^-�9�.�C-��MĄ\r�Ѵ�d7��3�z'��II�m�)k&�;�ޠ'��@���êMi.�XَZV�?�Wh��aNrؤ,�9h�1�0n�9���N�6C4;A\r�8@ ������h� �Ό��D4���9�Ax^;�tm�@+���z����h^�r�x�l�#.�	�ݫ���9<�P<n�UC\r��))k�ݫ;KM�q܇%�r����p+�s�\0��\rӪ�6�\r|��u�|�IâW6���5���;���@�Nqm�#rH@���:G<�v��ct��;��La�roM��0���MnmE���� ��7h���\n���+\r�8�pЌT(m%�')tBA\r�|0� ��\rA�\n �\0PTI'+��Ň2<�	 lF�5zA#�l�Y�]F�WD�doO�/KH;�Bp	���Q\"�O���H�T&�aA�&O��9^���(x2�����C\naH#G2R�	7݀4]kR%�����#@PQ8i�� r�P�,@@�9��2��zB/�Ű�@�	jUI�t�NI&�\$\0�s�7��ά򼆉�pr��ƴ���7��3ʀ�TDiM���A\0gJ�FF���%����33\$[�7Q\0��0�[�y�\r��3���u̺+e�0��l���U��0��c\0`�I�(�.9���6`r\$�*�V�[m)��b�I��t��St�wL�C_kp͆̘�.`t�A���PC<A���ҳ�\nAM�1G\"2[��-��X����V�,5�� �0ׂ�T��p��[}'�Ϊ�3JˤL`V���-HC����#�`�\\�H�ɉ1a�<��LgC�9�}.�؊H�F�i��U\$���/���3Z�a/M��(P�FJ4r7ˏ`O@P(MU�1t�J*\\6-J���k�e���N��r(Η	�ei4�\"Y�)b���	k*����Y�\nE/����D�5���t��`";break;case"pt-br":$g="V7��j���m̧(1��?	E�30��\n'0�f�\rR 8�g6��e6�㱤�rG%����o��i��h�Xj���2L�SI�p�6�N��Lv>%9��\$\\�n 7F��Z)�\r9���h5\r��Q��z4��F��i7M�����&)A��9\"�*R�Q\$�s��NXH��f��F[���\"��M�Q��'�S���f��s���!�\r4g฽�䧂�f���L�o7T��Y|�%�7RA\\�i�A��_f�������DIA��\$���QT�*��f�y�ܕM8䜈���;�Kn؎��v���9���Ȝ��@35�����z7��ȃ2�k�\nں��R��43����Ґ� �30\n�D�%\r��:�k��Cj�=p3��C!0J�\nC,|�+��/��╪r\0�0�e;\n��ت0#>�;��b�%s�A=CS�N��k�.������*�������)�mp\"�2�6&\r�����I��4��ޯ˭+ʽ� @1(0V���n5����^u�b\n\r8�:�@Rh�&�X@6 ,'�Q�M�ʕJ ͫ���t3(\"�������P������ �cġL%��h��7<67�)RX�)!ugW_;p3/���z�,x0��H\$	К&�B��� ^6��x�0��o���그h6<�ST�%���3ӝF�!ij��_,ب7�)����ƅ\$c0���� ����_/�?�ʋ���R�M�k{W�2:�7�Ȩ�?X<=B��8@ ����n�&��ִc0z\r��8a�^���\\0�,/�8^���K��xDs����}�\$l*�83\\�êB�:�j#�����':#*r&��2`8Bp���v\r.p\\\$��<_��#�'��p3͍���P�D��H�86�\0��uS�q'�\\:h�[��H�\n|�1�/�����Z���e6�����̛'A�����w\\��?��R� !�� �mÛNj\nu����p��I�%�&�\\q3���3.��DN\r�gȊ�XP	A!AAX\$��#3\$�	a\$Ġ��3����7\$�ٮsl��q�8G��%���n���\n�Q�?������Pk�\$o)Ws��@ *!�Ķ�`BC\nxD�7���R��8���A�%Ǎ}������T��(�C���(e�����*%M��f֐�x C\$�ra\$_rya�\$���V�\n�\"ĭ��ph�ifCf��7��L#��kA?S��<�\n<)�DH���=P�P�t�v^ K��:��bp�@&,�*HE4\rS.Ȑ�7�ܐ:�M��΢�e3�Y�7kA�Pp�_�\0S\n!1\r�`@�A\0F\n�0�*���\r�ri�\"N�֜�4�(ӯ�����O'�T��8��:�̇A �N�Q�OU\"=�NU��!R������䔬*��&�(ls�4��,�t#��h<r^����@��jLP�\r��l*�@�A��o�I�Յ\\h�G_�~\\ʾ��;4���_\0�90�x�\"I�I�e+�c�vcbV	���`��(c4a̅<�cV�U���R�S��0��:�dU�\r)���ý]�\r�t��Czb�R�r��b5<���f�%Ԏ�'��}uVX�4��Ő��]J2�\0PCZ]K���eV3a	��`�R�7�ƣ�cm��Q��f�4����";break;case"ro":$g="S:���VBl� 9�L�S������BQp����	�@p:�\$\"��c���f���L�L�#��>e�L��1p(�/���i��i�L��I�@-	Nd���e9�%�	��@n��h��|�X\nFC1��l7AFsy�o9B�&�\rن�7F԰�82`u���Z:LFSa�zE2`xHx(�n9�̹�g��I�f;���=,��f��o��NƜ��� :n�N,�h��2YY�N�;���΁� �A�f����2�r'-K��� �!�{��:<�ٸ�\nd& g-�(��0`P�ތ�P�7\rcp�;�)��'�#�-@2\r���1À�+C�*9���Ȟ�˨ބ��:�/a6����2�ā�J�E\nℛ,Jh���P�#Jh����V9#���JA(0���\r,+���ѡ9P�\"����ڐ.����/q�) ���#��x�2��l��1	�C0LK�0�q6%��3��̎A�*k��*A2��sN�T�wP!.�枿��\n�3K�(��CY\n��0���Ή�x���f���./�X��S�҄�%=+P\0M�k�qh<�\0T��\\w8bhzCb.��úQ�����1Ũ\n)Жâ(\r�׀�.�Ҕ4�\"qHB���'�Ȏ2)�,/7�\n ��[!��6ڊ��H������B�3�6�c^J���	@t&��Ц)�C\$N6��p�<�Ⱥ�aC:6P Sb�ؔ��3\r��-�I��\$����\n�{qd1�@:�j��9���a>f_��6c���aJ��	�,m>�'��i)�j�:�/�@ �z��;q���`����D4���9�Ax^;��r��Y#�\\��}@����}�K���}ȩ�r��1�9���oPx΄:㳯Ќ����3,\r��������q(�k,^���(Aӌ�OV�]{�vn�۹�v�nw��*���>	)�ʧ��qQ)�����pOhk'h��%���iX\r/U����2|��,R���_rD�*�3��62p��'��C3�1�=��Rl��:1���p��R~�(4��Vi�Ү{4�F%\rْ7�^2n:=��\r{)p@\n\n��]�qd�g�p\r�p7F�2�嬇Ðt)�%\r����ù�r1Y���X�Wq&��0�H�D��;���\n!\nu��I��\r	=aL)i��Ea�12�@�	H�,�\$��JJE(�y.�U�kR�MC��^��X�J�>\0�>��^9�D�\$�p�l��iZ�4І�>r\nq�!�I�G��&qUP8�9�DF�����P	�L*F ��<�p*2E�8�9��d�v6���f/.!GE�P�	.!iQ�RfO\$~'h�/�y^`Nw)O^^��Ba[G1�`���q)�8����9l\$�f�J�Tb�]�0cF��e�����j�ٙ�(�V%�Yj��*v�M��L�Ubd`��<Iq+��ng��e�S,e����?a\rR�5��@��V��c\rd�O\0�_C{YX���Y�`\\�'��6���шU\n���tI���'�l9L�.�I�e6��3j�\"�'�h��@H�	�|�xž��d˰M��<�R�k.�5VI�H\"���	�^Z�Z+Bb�qD�v�;8�9BC���b�����!v�-\n֯�\\�łR�So��TܯIZ<���jDֵ��G�mb#4/;\0�D2.��N�E{(��T�gB���:�F�d��c��v�6zd\0t";break;case"ru":$g="�I4Qb�\r��h-Z(KA{���ᙘ@s4��\$h�X4m�E�FyAg�����\nQBKW2)R�A@�apz\0]NKWRi�Ay-]�!�&��	���p�CE#���yl��\n@N'R)��\0�	Nd*;AEJ�K����F���\$�V�&�'AA�0�@\nFC1��l7c+�&\"I�Iз��>Ĺ���K,q��ϴ�.��u�9�꠆��L���,&��NsD�M�����e!_��Z��G*�r�;i��9X��p�d����'ˌ6ky�}�V��\n�P����ػN�3\0\$�,�:)�f�(nB>�\$e�\n��mz������!0<=�����S<��lP�*�E�i�䦖�;�(P1�W�j�t�E���k�!S<�9DzT��\nkX]\$������ٶ�j�4��y>����N:D�.�����1ܧ\r=�T��>�+h�<F����.�\"�]���-1�d\nþ����\\�,���3��:M�bd�����5�N�(+�2JU����C%�G��#���\n�T����,��`#HkΖŵJ��Ljm})T�ʣU%�c�Ļ����7�\$�qN\0P�4�c�6���\r�@2�׵�}_�����\09�#x�9��B�hˀ�8N\$@#\$_̓��W(mԌ��l�q�/�8���u�\\��Y(�\\��76@��L���Zt��:&���ZN�h5�c��%���A j�����'!�3y�/%�Uh��ɡ&����7o@�\ra�[;r\"���Z��	�C�Y�kQ!�~�h�襡�㲨�풩J'+��E�)-k�:f�\"�\$e�����e_m�:{�ЪJy|=7P��,OZ�>=�����W�wKS���[��Ͼf��?�<د3Y��Ѡ����\0P�(�h)ި��`�\"j�6����W�P��o�xhГG�4���qQ�P�Qh6��^�Rb&&�Ö�NB�>� ]?��,+�/+\\�\$d�a�9\$b�ø-݌>�=Ka�\nJ�b��T�`�6�j�b�B��8py	%�T�`�~0�t3�TxaaE!����fa	���������Dz\"Adª �S�f*\0%�C\"Bn��V�O�.%p����j][�Ne	*��0�\$3�)��t1�n��d�mD��&�ӳ\$@��1��CHn��(CP]��:&����^P��9��@�e�����s@��y����2�/���\0/�80�F�x\"�=I��rPb���0��:��Qofy��+�h�O�쯋�ZT�4�/p�Q\\qO9��4��R��WA��w�)�b\n��p��_��1f<əs6g�Q*���S^l�V����.S��������s��H��k��I����[:;���J#��z�*|I􆐢�,&�\$�*�\n���%�����Q�\\��YM?�Ę��)��E�W }L��~��6dw��(�Ƣ�'\"�i��Qzx��4X��u:��#�u�_�:�b]�c�#��{4��YX�'J�r=�E��:,I6������`5���c�M[/����TJ�j�B\0�Ft�cb��()`���N#�EI��ܩ2��rND�B=2j��]㶫GZ�^;��\nl��H����=+&*UH�0��0-�I`�Bb�OD���D��R`IR0+���Tg��톐n�PO��[P�n�ġX�������g(Ş�����B(�\"�;N F'�FD�sE5��W\"N��7���\"U'n�O�SRyW?򃔠����)v�NІ��\$�C��љ9X�\r�A\0P	�L*Q3�cͤw@)VEW�|���,y�EQ����M]�����x���Z\$ش�¦NpɄ+DCӐl�ō�i4�%�\"53�9�?e��RQA��)W5�\0�Bfs�T�A�@��PWg]��2��'5�97���3�=�d+�K�צ�T��x)Cjmft�!,y����v6�~9 ���V��Y#.�ve9n��\$��]8;�������}m�&.F�y|��2���ڴ�ڢ�U�MB�\r��h\n���`�k�%w��C��ʷ��GT�&�ہqu�4s�R`�)2W]�gX���\0U\n�'Ӳ.cr�\\����uC��mE\$>�Z/V��Ϭ���Ԯ?`(J_E)	�hX��,T]cR������������'E#Q'G,qF&]%U��Rc=u��F:L�o6%9/,O��N��I��Dyb�y/k��P�*�f�E�]��BK�a%�ܡ##�.Abmۜ�t�x�ZR�N7��y�W�@�)�6�R	\\g�Ŵ���wkҝ\\�������I�	�٧�ו�e������f���<6:�9�v�%Z���.�8`ʩ�_˞���(k^MC���T�T��&E���m^]Ȥ]IZ����I��ɐ�I����	��\nT���\0�`����di��ER�e���(g����i�";break;case"sk":$g="N0��FP�%���(��]��(a�@n2�\r�C	��l7��&�����������P�\r�h���l2������5��rxdB\$r:�\rFQ\0��B���18���-9���H�0��cA��n8��)���D�&sL�b\nb�M&}0�a1g�̤�k0��2pQZ@�_bԷ���0 �_0��ɾ�h��\r�Y�83�Nb���p�/ƃN��b�a��aWw�M\r�+o;I���Cv��\0��!����F\"<�lb�Xj�v&�g��0��<���zn5������9\"iH�0����{T���ףC�8@Ø�H�\0oڞ>��d��z�=\n�1�H�5�����*��j�+�P�2��`�2�����I��5�eKX<��b��6 P��+P�,�@�P�����)��`�2��h�:3 P��ʃ�u%4�D�9��9��9���\0�F!j��\nb�C\"�Z��\rØ�7�)H��&cl�\"��KZ9B�=!�\"|_BCT�T(��RJ �*����6I!�\\08�M�Bv�7c\\���\0Ă�M�eY�͝d�cSZ;C�T4`PH� ip�/�П��P5��xޟ���/6E��&%�� �sܪ+I���\"��Z>	�M\$2�5=[�C�Z�D���R�!&�6*'E�d��(��N86\r8�20�y��#�.T��(�_��Y�K�\$�R�\$��R\$Bh�\nb���p������8`J �,J�d�3�J:�\r�0͖#\n����M_^�@P�7�/X�<��\":�q��9�è�\$�\"5���0��;���Cj�:�A@��;uy_O�X�1��B;WK�4:�\"�@�5c2�:�Cp�#'\$�\\DYH�7j(\"� �3��:����x����n�Ș��!|������A��<��^0��V��D[��<EwXDu�uC�\0�ѹ)JVVO�B�\\92@�HrD��<\0@�#�y)�<���z�a��r����)��\$���NPn���(V\"٬n��5��<���v'!��B��K1\r������Q	�7')%Ԇ�����܏�7A��I�d���{}5N�8@�ᢚ�\r�'T�\n]�����de�}3�8��\0NO�,0����2�1�ȄS�<�h\0=G�[� 9�\0����c{��?sLG�)�Y(D:�j�q�\$��(���\"��\n#�r�m.���@&�Hw6���w����La��RR��:d0����F��`��G��\"��<��V��z\08�-��ZKɋwt��	���\$�*��0-zxQk(O���B�ɞ���X�r�f��A�:���v�L�Ls	���\n�4[k,<\$�S���xS\n��PHRxT�k��'�A�AL����T��u8�42��'�XtHm↶\n%4��\$�ଢ��Q	���(CE�0T\n7,�]+%��4Y[=EB���YD�쇓�@˲�\0�\$�pj�u;�=Iab�(aQv8웸�(IJ�X�XȢ�H0v���;�\$JBl\r��5���PI<g����D���G�=B�\$JB4���	~�T���VF�<�c�܉�v`0��E�L��V�n���*�^@¦�38�0���az�oh�w��:�\0`�I~�bG�>���Vf0&݀̓��Y5��+IQJH�q�\$�(�!�\nJI�ZĆ��0���u:茍�dQ��1'%!07�@�D�BJ�оr�	��J�i)�VC'�e�'��\"�����NZfb<�L��J\n�\nl02�\$J�Y ���	eb�]q�T7Hm�H'I�_��B�UI�\r�\0�xSYA";break;case"sl":$g="S:D��ib#L&�H�%���(�6�����l7�WƓ��@d0�\r�Y�]0���XI�� ��\r&�y��'��̲��%9���J�nn��S鉆^ #!��j6� �!��n7��F�9�<l�I����/*�L��QZ�v���c���c��M�Q��3���g#N\0�e3�Nb	P��p�@s��Nn�b���f��.������Pl5MB�z67Q�����fn�_�T9�n3��'�Q�������(�p�]/�Sq��w�NG(�.St0��FC~k#?9��)���9���ȗ�`�4��c<��Mʨ��2\$�R����%Jp@�*��^�;��1!��ֹ\r#��b�,0�J`�:�����B�0�H`&���#��x�2���!\"��l;*��1�ѫJ�2��6�|���㔽0����[T��k�ߌ��>�\rq3�\r1S%�T�9�\0T\n4�i3�\n�hԏ2tC	�|2��\$�:!�Ę��HKOT\rER\rI-NS�M,,��A l��p�N��\rj0�'N\"4���P�\$���2�\n3��=K����Ҹ	� -6ӬiC�-(\$%p�]\"����l[K�v��Zn�CW��m�׺{|�C�%Q�7�t`Wr4^�l�t�^=%P\$	К&�B��@ch\\-�oX�i����h6I�S�H\n��3'J�U&��3�n�(�*\r앲7,��:�r��9�è�\$l�I�h����9\rêaL�Ji��9�	B�%��c4���\0�M-�T1Ͱ8���n��0z\r��8a�^���\\�l�P\\��|���K6��}ҥ.�x�!�ޛb/Y|��\n��|r��F�H�(\n^&�(��jp�yr���Lj�r�)�s�9��\\����c,�̓wR��H�82�X�:u���M��9�*\"H@�SKA��!4o��#�VBL��xg\r�%17P�@�ct� ;���]`\0roA�%�@��Qj\rI�5f�M��B� �RX e���>�xB ���0E��C�P�BIX�EB�Z;��\0()\0���e �y�\r�!�ҡ�� �X�)�^٥>����\0�`�� Q�}��q�{\r���3��w4���' ��Ua���0����K�S�D�����Fw+�뮳E�kVH\0��\$�l&Țҍ+\n2b�V0�X����Ԃ�\"D���@��ߩij�!/	\$L<��NP�h?=\nC8�AC�u3D�3�8���f�� 1��h��3-�:�bvd�lSC!蛅\0�£�M,5y�.%� e�*�Lx	�;U\$��eP�6���w��@m��\r��)��2� F\0��`�ZA쟿�ʒ�0r&o�C�6�CI�2��7OE4��=BeJ_TZz�T�Hb!ؿ��T��F9݄)��\0HS�>�/��Ī�`5���I~E<L��04���j̿br�U�ŀPCI����tͩ8/E��EP�o�YF%��	Sca�\n�P#�p�Cs�/a�3���1ԅ|�F�0��i��o_� �Z��my!�)U�1+jIRŮ���Cp#fΡ:�8]��	�L4�`�Y\r�1�b5@�\"�T@sE`*ǩ�Ɖ�!��D�Q�c��\"�`�^�9J�Y=\$��&�@FH)@.k*�Z3�@\r��6�2�\rhzj��N\\kX����\r*�ߘpˇ.9�8�F\r)��Y'N0\"[r�BJ���-��\$i��hQ�A|��B�%c6D�8\0";break;case"sr":$g="�J4��4P-Ak	@��6�\r��h/`��P�\\33`���h���E����C��\\f�LJⰦ��e_���D�eh��RƂ���hQ�	��jQ����*�1a1�CV�9��%9��P	u6cc�U�P��/�A�B�P�b2��a��s\$_��T���I0�.\"u�Z�H��-�0ՃAcYXZ�5�V\$Q�4�Y�iq���c9m:��M�Q��v2�\r����i;M�S9�� :q�!���:\r<��˵ɫ�x�b���x�>D�q�M��|];ٴRT�R�Ҕ=�q0�!/kV֠�N�)\nS�)��H�3��<��Ӛ�ƨ2E�H�2	��׊�p���p@2�C��9(B#��#��2\r�s�7���8Fr��c�f2-d⚓�E��D��N��+1�������\"��&,�n� kBր����4 �;XM���`�&	�p��I�u2Q�ȧ�sֲ>�k%;+\ry�H�S�I6!�,��,R�ն�ƌ#Lq�NSF�l�\$��d�@�0��\ne3��jڱ���n�-g���`�v�<:�p�4��r֥J�{QM?H�n��R�\n�,����!�\"��D	���zs3U�D�<��w>����)t�u��\"ϼ�`��j,˃�L����\$��.`PH�� g��+]�����:Y�,�\$� �\"Z���?o=Sz&��\rx�	����7|*�3��XȤ��\nN�q2����Y>i;mvC�GeɄ6���~��*�,eޑ�CR��N��\r6�Av��/jh�l�>ۥ�H�+�m�ik�k�i�)i���mK7\0�����3��\$	К&�B���`�6����ӏ\"�E�a�1FK���\r���ܷa\0�98#x�3\r��������a���{�6�#p��p�1�np�3�`@6\r�<\$9�����#8�	f6�C��aJ�Q���Y\r��yh�͹B\n���̰ê�B`� �G����kEg�D`�a7��3�D�t��^�@.09�#Df�xe\r��,P�!�\"���! �xaŭ����DMag���\"b�Y{�'��x!��ObOT%`�����N�r8�!%&�Àiw�2A�� � �P�B��\n�d���C(b�!��Z ��|Chp9a�H��ϑ�d7�#��k8!�##�ptI���EX�ȡZ����/��� �@�ły�\n�g0�8n�A\0w9Ox1�� 8r��0�h���{�y�>\$]0���\r9�k���0���Z��)������4\n\$�Kf-/?���§K��B�\0���m�w8�\rM��<��.� ��`����@�c�r�`e`I9C�v��A���;Ѩ6���9�h9�w��Qqٓa�8?(��JK�'h1��0C< m�`K�VE�Z �R�M�6v>]�\\���FE��BD#/�U�*SJW��K\$ֳ�����5�\rH���\"��*��CO��U\r	I�8�%\nV�o���B]�d\r,�t���9��8�S��C22\r�2<�zd���GSj�\$s�YM��J\n\"�'��3�ͳ�5�(\n�䤛���@�)3\\v{�r�b���T��P�\n�S��Ѭ&JT��y��7�)�EX�\"P�Ѽ���V�@L(��@�� 90h#J�Xi�)��DH���F���v���P*��ϳpIpjp�H��M��.+\r��t�H�_�����	����ŹⲰ�������l�7�O�,A8o��dchs�\r��(!t��MҶ7P��f�L����k�`JA���*�@�A�ĂvI	�&t�Y<��SW	���Go�̙+S�͑2W�8�|韕	k(��Ҕ�RW���hU���\"~Eb��\r!�<����XT�\\�A�eD�2���j9aIX�L�hDՑ�d��R�F5'��V���3�H���s;SF����a��C=�mr\n�+�)�^�C�]�R�v�[ƹ�Xn=v��S�._Q�'B҅�=A+�nj\"�Oj���*yZ��n8�v�}��S�A4�Pnv\"4�yQ\$H_�";break;case"sv":$g="�B�C����R̧!�(J.����!�� 3�԰#I��eL�A�Dd0�����i6M��Q!��3�Β����:�3�y�bkB BS�\nhF�L���q�A������d3\rF�q��t7�ATSI�:a6�&�<��b2�&')�H�d���7#q��u�]D).hD��1ˤ��r4��6�\\�o0�\"򳄢?��ԍ���z�M\ng�g��f�u�Rh�<#���m���w\r�7B'[m�0�\n*JL[�N^4kM�hA��\n'���s5����Nu)��ɝ�H'�o���2&���60#rB�\"�0�ʚ~R<���9(A���02^7*�Z�0�nH�9<����<��P9�����Bp�6������m�v֍/8���C�b�����*ҋ3B�6'�R:60�8܎�-\"�34���0j�/+�\r\"\"�5*�+;1���3��&\r*#��0��2�0DTɨCh�;����;ʩJ:\nX�&H��*��b<������5\0AQ#�50cp�5A b���h�)�����b�!\nm�C(�B�23�F\n:#% ���E �X��`�!KC�5��:��cH�5�u0�m\r�\$�P#4��wM�Ѕ�,x^L�O{\r7��v>��:��@t&��Ц)�C�,<���Z��V����\0T��\nM�܌�4	W6H]{FN�H�!��@6�L�o<�c`�}���*N�[&3Ű䃖�D\n܍��H6������Y�r�j��{��	/��>���J��-:�w�˨�\n�aiP�.��0�{;����<S�BɪUÖ����Z\\:��Mxδ(�x��(��CCD8a�^��(\\�qr�3��^2\r�{؅�}�q#x�!�[�\r=��?c�G�f��Q�4\n�	��:���i��J��۰\\r��5�sçA�t�7P��C�Y���>��#wj��H�8&1�<`�۽M��#R�I36r�`ϒ��T��#�����|��3��R��@��j��g-�}�0k-(��&gZQ�L�pΕ&|�xYlܿ��h�a�Xih4�B�b^�qA��Ē�jA\0P	@Ĥ�ホm>��2`PSK& Q)h�GI��g��Ġ@e�ɛ\r&	��|��a�G��R���c��C�X��R��a�]��dȳ�&(���\r\rB &!�e�`��҈ aL)h��Q3M����huA�K6��M��;-حP�	Z�\\�96���{�U���V-�Rl&�=����WSa���3-�ꆖ�pΤ�qJ\$� ���P��`sG���\0�£>�C	�Z� 	�u|�粛�Ϛ%1������F���t\"JIّ,�i�U��Iz�3D�#@���k�XF����A�qD!5<���n7��Jh�JB�dǘ��d��B��ң�IM�^����c��v�U5��깍&�\r��V�\"���B<�NH'��a��d0���y&�4�\0�%08�I�5MV�i�H��Tj�V*��Q��TP�M[�h1��r�kɊ����b�I��\n/ęٸ�qS��E%[0]��-��ܴ�Rw���c(��\ns�O\"tMK�)8�\r(-S�Y\"��4�b�y�ZT(@(\"��(i����)���#\ruov��]śh�<E�";break;case"ta":$g="�W* �i��F�\\Hd_�����+�BQp�� 9���t\\U�����@�W��(<�\\��@1	|�@(:�\r��	�S.WA��ht�]�R&����\\�����I`�D�J�\$��:��TϠX��`�*���rj1k�,�Յz@%9���5|�Ud�ߠj䦸��C��f4����~�L��g�����p:E5�e&���@.�����qu����W[��\"�+@�m��\0��,-��һ[�׋&��a;D�x��r4��&�)��s<�!���:\r?����8\nRl�������[zR.�<���\n��8N\"��0���AN�*�Åq`��	�&�B��%0dB���Bʳ�(B�ֶnK��*���9Q�āB��4��:�����Nr\$��Ţ��)2��0�\n*��[�;��\0�9Cx����0�o�7���:\$\n�5O��9��P��EȊ����R����Zĩ�\0�Bnz��A����J<>�p�4��r��K)T��B�|%(D��FF��\r,t�]T�jr�����D���:=KW-D4:\0��ȩ]_�4�b��-�,�W�B�G \r�z��6�O&�r̤ʲp���Պ�I��G��=��:2��F6Jr�Z�{<���CM,�s|�8�7��-��@���Z6|�Y���L��\"#s*M��B#��=���5L�v`�S٥<2�-ERTN6��iJ鍵�B����2����{iY\n�Z����9Yk�BO�1Ҕ��P�a�ҲY%�괙�w�)m�;du����uua�mSJGU�U���(�_z(�r	f��;�O�/x�A j���H�qI]��Iq��z��\\\rI؋T�����M\\�JU���E'�R.�y2�6�*�<��9\\���ΡZ����zu̯�������������#||Ug��������ӟ�qaa��\\�߳�F���sz]��%[�����\\`������ÀM��T \r���@��M	��)�0 /\r�����\r��]ihD�AH򚡽Q%!�ռ@\n;gt0�#��0f\r� 2�DE�#d�\rc&s����jl5�/y�\r��7�@Uua���0�C` (a�\$0X|C�n!�0��A!��mI�����\nb��]䤜*��𝊎)}����[���c��I��\r��a>��UF�A\0A�(7&x��*�����w�pf��4@��:�;��\\Qe�gɨ3��|ӛ6�\0� }6O�H���|�^x�k谱�;��˓Ӻv��6[�* \"+vt�+�FpٽB5�ÔJ�+�58p�y���N=�\0�����`�9�1�L˙��g�8����\r�Y���K7L\0>	&��1P�'\$�f@������ϕ<!������\\��󠥐	�Ѡv色����WCE͏���ݩ+�P4 ��ڥ��ǐ�x��g��Ɋ����ry�q�;ǘ�!�a�>5��*g�l0���\$P{�R�L3�B�خRE��*s�ʍ�-A@\$�T���QL��)�0ɟ{\\0x��~�����q�y�I�=��ǧ����N��Ɣ0�q+e���K�柣��L�梆��#(�sP\n\n����)�i�V�x�a��V�0��A�0ʽ�Y���k���~5gV�`*C��M&���pb�{o����@ա������\$��h�4ָK���\no-5[���l��wK���q���&���\n�����Q-�W��Tr\n/�x��✼U�;��W��ad�j�o�9��G����4��Ȟ�n���D��Ozxɤ6�M-h}�L����r���8��g���v��tF\0�TȈ�O�4�ү �L����8GC�ҫ���L*�!L��AM (��3^���\rj̑:�<���Bn�ᘗb#do(E�^���Q	��Z��/�0T�ѱǆ�N�\$>r΄�/M\$��p�`+��O��؈���%��ݎ%=�ǎ2���3������F�qm.��}�m�@�(a���d�r��*��8^��#`���\0�[s�K����\"����i�)���)G�p����`+ρ�1��AZ��v����S�~C4n��x#\\*y+����T*`Z��̉\$�q�V������ME���g����<��U��P�y���ٴ�X:���nؓ�\n��K��\\`��rANa�ˌ�%���l�,��~�)Wy�F�\$L�Gp���l\"\0PM��E����k\n:���ϰ�/�mp)PٮUai�Gڐw�ro�,����c��dAH[Or�U�W\nFo�ꪜP�/�V�֪�\0���:u�>���l��q��Ve7� �\n4f��g֔/z��&H�\0cB�:�Z[�A��bD���ʭ�Ihx�/b�����l��8�O���Bi�R�o�o�P>Q\r8��4��\"�'d��t8Blu����5Pv7'~Z���`|��S�Q�@K��B�E�";break;case"th":$g="�\\! �M��@�0tD\0�� \nX:&\0��*�\n8�\0�	E�30�/\0ZB�(^\0�A�K�2\0���&��b�8�KG�n����	I�?J\\�)��b�.��)�\\�S��\"��s\0C�WJ��_6\\+eV�6r�Jé5k���]�8��@%9��9��4��fv2� #!��j6�5��:�i\\�(�zʳy�W e�j�\0MLrS��{q\0�ק�|\\Iq	�n�[�R�|��馛��7;Z��4	=j����.����Y7�D�	�� 7����i6L�S�������0��x�4\r/��0�O�ڶ�p��\0@�-�p�BP�,�JQpXD1���jCb�2�α;�󤅗\$3��\$\r�6��мJ���+��.�6��Q󄟨1���`P���#pά����P.�JV�!��\0�0@P�7\ro��7(�9\r㒰\"@�`�9�� ��>x�p�8���9����i�؃+��¿�)ä�6MJԟ�1lY\$�O*U�@���,�����8n�x\\5�T(�6/\n5��8����BN�H\\I1rl�H��Ô�Y;r�|��ՌIM�&��3I �h��_�Q�B1��,�nm1,��;�,�d��E�;��&i�d��(UZ�b����!N���T�E��^������m�0�NpL����6��;��eC�R2�(�9�#~o��,���j��e9.ې�9W}ʎ����sЅ+)�wV\rC�_XTƞ�;��Đ���+��\0Y��=����\n�GPӃ,Ŋ�g(������v�\$#\"L�CIr�/���A j���(�(b��w;�D��4�`Z�b��`\\m�l���d��ʙ�[��:���,��d0���jvʫ8g�\\j��ฺ�u����T�t�ij���'M��eS��U_UxQ��S�������H\$	К&�B��xI��(��@/t�����^�X��uߴ�⒞{\\E����Q�=A�9���0lJ����P���m�0������eCF�*��Cn �:�p���a�:��@xgJ�����g)TE@J�jU�0R��r mG	F�do��?u%\rŎ���+P�&���Xug	X�Crn����3�ț�\0<'��`z�@t��9��^ü���?�4�C8/����Z̤@�S D���/ ��8�*UK�m(�����Z����H����Sb1�ѳe��\r��E���Sn�J�MN��(`�Rm�4��\"dXh��>H�9+%��w�rv@���(e�f���3�^�@>	!�8��(ä��l���p��� �����\n��ā\r����sPsVʝ*�E\\� A-����a����*� ��##�txT��7?�3~\"Dh��e3@���(\0�A�\0c�� 4�دމ�:G=\r>ap�]2�S�꬝ef�*�`[���+2��A\0P	@�\nUK�.\n����w&z�uK���R��:�4�W���}��?A��(0��	O���D��e)Zn���E�5\rb�l@�T7�|�:�N;���(�i�DSj�{�a�P��Map����Vr�0��3�c�I�F&ErUM^<0EY��4XAo�W\\.tc�i]�]e&K�[�ouE�N����a]-������A�;n�a7�NV�D.�i�u|VI%'�@�ᏊO�� ��C�u?��3'\0�g���i�1Ą�S,҆?h>�\"ۼ��et������V��=�e\$\\cL�0\nU\$���|��\0�p���!BQ�.y\n¦:�c�Kme�\\���U��jY�P�|)pSb�pH��n�8Q	��3Y @}�XF\n���`�A\$UĘ�@&�ܜ��Hm����!0\r��[\r�!����S=u1��鄂�	{0o��I�7��FTVYY�i�Q���M���`�[c���K4F�㭊��W���W�CHc\ryL����3G*em�Ұ��m�I��E@�0-�Bad�V\"��;i5LiR�Nn=ֺ��ײ�_��A[�\0�zp�A3��(&�����Y����6F�s_��֜�8WD��7Mq����͊YS���>\$K��N�9�2i@��]2�K8�Q�2�a Q+07�@ڜS�u]NJ�ѡ�sō�+�x�-hb���-}WҐe?4���(�a9�ef���VJ��k���9�h�0Ba+���Uה8G#���\"f��r;��A^\0";break;case"tr":$g="E6�M�	�i=�BQp�� 9������ 3����!��i6`'�y�\\\nb,P!�= 2�̑H���o<�N�X�bn���)̅'��b��)��:GX���@\nFC1��l7ASv*|%4��F`(�a1\r�	!���^�2Q�|%�O3���v��K��s��fSd��kXjya��t5��XlF�:�ډi��x���\\�F�a6�3���]7��F	�Ӻ��AE=�� 4�\\�K�K:�L&�QT�k7��8��KH0�F��fe9�<8S���p��NÙ�J2\$�(@:�N��\r�\n�����l4��0@5�0J���	�/�����㢐��S��B��:/�B��l-�P�45�\n6�iA`Ѝ�H �`P�2��`�H��<�4m� �@3��F9��t��Ct��>32��܃8#�N&\r#�;�M���\r#����TX�B�7�24 4��Jb�J�B�4\\'-HJ2&������ԩ����.�H� iT�2�\r�O+K�<��j\n�0�S�ԥ++,匬����x#�H�<��N꾹.������:2���[	x����00���o�7\n?q�):�4��{�)�B �h��<�Ⱥ�#Z3��P���)N\r�Xa��j?z��*|9�и���c��:����\rx�͊0�\0�0�PH@7�c��܌,�x�\r���Ä2'�-:\"8�H֋�n�C�[�Z�����\$�~k��+,�9���;z!b��#\"�ְ�Q�*x�|��Id:���X��V����9�0z\r��8a�^���]tmh�\\���zb�s�4�!xD={�b����T�yx��,�x�!����#�[��4 �:��\0ؼ�4=��h��h8��1���8�t^p�7{q��p@����BG��b̳igp|/��|oȎ��ԁr��47sSJb��\"(���f���v�M\n�����uf�䎧 �T�9�8��6#��,[1&G��<�К�J�<6%�^tI]�|X�.� �\\g\"������qD��'����xe2a�\$p��Cr|�ԉ�HY�\n (����z� `����ج���)�8�\"�@yAa��2�>�J��G�Ø��ރ��Y�rK	r�\$g����fO�L?fL̐0�#��p*�~�����h���wM�t�5��:��N�E:Oo�!�0��0j3�I�bJL[yy\$��rRJ��&����bE���R��4,WE1�<b��q�'E)\0I�T�C�`6�*�;U\\89@c�{N1�D�.�^�ZY��A���Ī^�x3@'�0�kH�x3)��T\n�X�*\$]\$]iD�	P��AGԴ)��J�R.�JL̃�H=Z�0��J��\$^�<��\n�7�Ց��@Ց�8�0�Ԅ!IA'4��8�M�0�d^#)%a0������]b7F�e�E�5Meq��j��\0��\r�Sa��D	��e�A� i������`+�E�JPB\$��\0U\n���&�\"	|�u��<O�\roRuʨ���!��l��t�WW-l�.�r�\\K��}&�{D�l�PA�����ʐ�\n��H.'�װ��ؒYt��w)��A�f6ܟ;nO�`�˙�2�T�����B���\$��+��[�ùZKNץ+m+ʔ5!M���xp\"�\"2�i;m�>Iָ �~\\����t��\nԥc�\0{���H��\0";break;case"uk":$g="�I4�ɠ�h-`��&�K�BQp�� 9��	�r�h-��-}[��Z����H`R������db��rb�h�d��Z��G��H�����\r�Ms6@Se+ȃE6�J�Td�Jsh\$g�\$�G��f�j>���C��f4����j��SdR�B�\rh��SE�6\rV�G!TI��V�����{Z�L����ʔi%Q�B���vUXh���Zk���7*�M)4�/�55�CB�h�ഹ�	 �� �HT6\\��h�t�vc��l�V����Y�j��׶��ԮpNUf@�;I�f��\r:b�ib�ﾦ����j� �i�%l��h%.�\n���{��;�y�\$�CC�I�,�#D�Ė\r�5���X?�j�в���H�)Lxݦ(kfB�K���{��)�)Ư�FHm\\�F �\$j�H!d*���B���郴՗.C�\$.)D\n����lb�9�kjķ��\\���̐ʾ��D����\rZ\r��qd�隅1#D�&�?l�&@�1���M1�\\���`�hr@�:������,����΢[\nC�*�(�i��4�c�6��@7�A\0�7ZV��lZ�(�:[c��7��4P���F#M2(r��L��J�4�\"�윴���GUN/�\0���;s?K����s3��BcH�(�Ȃ4^�����&M��r�}M�z4��PH�� g��8[D5e�4X��8[\$�]�)_�ZhFMqAm�C^E\n���ƸP����65҄ԩ�\$�hF�D��׃j��+�?�Q��W�I��\nХ�VK���|��x\\�;ڔ��۷\0��������7<_w��\\�͓0�Tt�;�|��HѤ9Z�th��ov(ҘZ�)xu����g�CqVh\r��嬺�&��]�X ������M��\$�=&����	c\n��Z� �g��?��L�O&�IX�n�ɲ�XG��9��蒋�d�����ɋ�}�	��5���k�)�i�?���,�����`Y%IP9\$�\"��`�}	4�g�L��#)�x欣���N�\0&�W�pp���ǲ� �Eq�	8��ҝ��l9\\��n�w8��3\r�Ԛ�M�T�&Q�\0A��4����3�th\$�2���� ����C0=A�:@���/��N�����`3����\"�!�s��^��.%ն�^A��>�P�B�VoHy�*i����	]`p�2�e�s��uJS(Yb���T,��՚F�z�+��^���yQ�-M�ܯ�Բ�e�?P��EH�\$\$����bMI��'�~R�9JYN��\"镲����Nry���[K��	��O�7�\"Pb_�3@���ç�aԩ�{]Gr�:J�s��<ҴI�����%�l�yM�k����S��F<	V����3��\r\n�e=��ۀ�J2Al��A�U���b�TʩkF�r�!���q�#F��'X\\@P��<��f�c�(,঎8�R�k�CDGM:� k�\0_�����>�*	F��ĝJN��i�u��\0���ںe�hϯ��\\H�kuJ�!겖+iFX�ZDD3�.�lh\$�^5�JzT)�6s	�X��i�uIJ�0��1�m���77F]\"�]WI��&��M�yrvB�3.n�҇C\\�������ީY�d��	!	)�8C����zA)}0�z�,\$	)h������9k�7E�jp�D�rq|h�bq2�@i�=G��o��ǆ�Mj2��&��B��ɇ�TQ�R!��D/\0P	�L*4w�.��jd��K�X21T ����+�r�ӷ\rp⫒�u+�^��˭j�v�SA��s���� \$J��.C͉\"E�	��^��`�)��\0�a��*̏q�]4�*p�\"q�l�=�\"��>*(7о���(�=�mOj�BV�t;:̕��Y��[6��5��k�o����}�����*c�c��N� [I�eݫ�&�5_\0���`+�5�bf+�7���w�!�sH������h�L���CsW7�4�¨T��Ȧ���:[��/jQ{��L��q����tg��8������!�qnF��.�b�l�hb\r��+[o]���Fű����)��b�!�.�HY0�tJW�EH �tC��Ԥ���ҌD�\\�K��;{c�xs됅�'^pvc�����?��������|r�Hш�n��yKl@A1�:�W'�\n,�y%o���K���ڋ�Ui�WAƗ�F�&�^�K7�4*;Ir���h�x����Uz(<�e���\"��O�";break;case"vi":$g="Bp��&������ *�(J.��0Q,��Z���)v��@Tf�\n�pj�p�*�V���C`�]��rY<�#\$b\$L2��@%9���I�����Γ���4˅����d3\rF�q��t9N1�Q�E3ڡ�h�j[�J;���o��\n�(�Ub��da���I¾Ri��D�\0\0�A)�X�8@q:�g!�C�_#y�̸�6:����ڋ�.���K;�.���}F��ͼS0��6�������\\��v����N5��n5���x!��r7���C	��1#�����(�͍�&:����;�#\"\\!�%:8!K�H�+�ڜ0R�7���wC(\$F]���]�+��0��Ҏ9�jjP��e�Fd��c@��J*�#�ӊX�\n\npE�ɚ44�K\n�d����@3��&�!\0��3Z���0�9ʤ�H�(�\"�;�mh�#��Ln1\r��?!\0�7?�LwFT��<�x�4���K(�T43�JV� %h�>%�*l����΢mS)�	Rܘ���A���T�,���\rR�E�*iX\$�@�70�C����L��R1�SF��A b����υc�5�%���PƜ3ɆQ7,tW�ëUة�6�C�\$(��;�+^��d�4p�A��^]�3;'I)�O<�`Uz�T#Y�T1B>F�[(�m}HO1[#��T+X�	�ht)�`P�<�Ⱥ��hZ2�P��=l�.́Cb�#{40�P�3�c�2��aC3b��Oj�����k��Z�t9>���ӎ��7��l����.Q����ū�5l�]ACs*0��\\���P��X�i�p8�F���� ��n�9q�:4���@(cF�3��:����x���kۅ�����x�?����A��H����|�\n�N�����r������E�l�(r��#�at+U�Wl��T�Ik�x/\r�w���k��E����C��{*]L��6�H��aBL��m}���α�)j��`4!tZ�P�#/*܉�hNKV�!��@�Hl\r�����Ðm�d0�e2�C�ua�#`��`oM(�h�ѼZ ��ކ��Cb�.�E!�~�ъ3F�����(\nzB�\0�	��3DxK��f���oGh]A�����4���ۙA�C �#Hw�n�� 9ZPÚ������x��uBI\n%���0v����I|��m��x�t�ACaL)f�_�AL�ee���IPfi��V]R�ANQU)5�.��Y%Ik�@\n�c�&���:-|N�c�O��\r�����~\$AS�kN�;�I.	\$H<�#��%tE\r�՞�v�j2\n���Gm��Q�4�)\"�Ќ�?mi��B��!,�@'�0��3�'0E�9nH�y0�؛��vqI� \"ޯϸr.�,�b�P��I�Gt���䡱W�U�>�@]�0T�=��S�&��\$L�#�e�)&��H&�Nw�\r���r@p�fSi�1% �9�Y>#�&�����v%R8NC���2��\"�~E��bЕ� 9&�bQi�o~��!��bcRR� �T*`Z-B�����\"d�#>�q��@ŏkvH���A���2����i&WEf_\\�\n�����ql-틷��E���mZ�X�W���z�͚sUsd�4��RpT;��h�`s�\$D9�\$�Y(��P�X�*���K�\r��NUr.���]��\n{�!ҕ4���*듓\0��ؾ��G:���9 ";break;case"zh":$g="�A*�s�\\�r����|%��:�\$\nr.���2�r/d�Ȼ[8� S�8�r�!T�\\�s���I4�b�r��ЀJs!J���:�2�r�ST⢔\n���h5\r��S�R�9Q��*�-Y(eȗB��+��΅�FZ�I9P�Yj^F�X9���P������2�s&֒E��~�����yc�~���#}K�r�s���k��|�i�-r�̀�)c(��C�ݦ#*�J!A�R�\n�k�P��/W�t��Z�U9��WJQ3�W�q�*�'Os%�dbʯC9��Mnr;N�P�)��Z�'1T���*�J;���)nY5������9XS#%����Ans�%��O-�30�*\\O�Ĺlt��0]��6r���^�-�8���\0J���|r��\nÑ)V����S0�9�),����0���0�pi+\r��F��k��L��J[�\$j��?D\n�L�E�*�>��	(P���]�Qsš� AR�L�I SA b��H���8s���N]��\"�^��9zW%�s]�Aɱ��E�t�I�E�1j��IW)�i:R�9T���Q5L�	j��y#dPA-,��6���B�-�@?���G\n��\$	К&�B��c�<��p�6�� �YU�I=�P�:Ij-�g9t_���Ɠ��P���C�=C&%��ZFEb��3�:bM!��^[��YC\$��H�I���z��?�EYcB�A`Q@ۺ ��h�7��z�t\$�����X!\0�9�0z\r��8a�^��(\\0�;�\r����p^2\r�p�:\r<�^�S0V�ate�xt�%��N�Ha�|#�4��s����F�����1U\0��ŗvN�V�o���p	�q�9q�w!����Ȏ|�\$(���A�wa�Mi!rsd�m��X!r!G(��l_�WP���e;��ۊ�:|O��1��Ra&#V1A��5&���8�\$F�����xL�� �N]Da�2\"qe&�\\�4�\n&\0��l}�0G��P�;�x�h�Rng��� �\"_���W�QFcH	|gs�~�YsA��q�(�g3�W��z9����dZ#�\\���e-i4P���@ aL)`@I�\$W�\$��;���A��5���-�+�&�&�bpN�����I4�R���Bya����0��xN�zd!ȉ\$�9�=�ʼ��?��A;��!E�8KQ�:�XUO\naQ0��LEQ?��+�\$X��LM�\0K9j��H�V��r�<.�\$`@q��A\0�����P(�B(	�+aL(�O�|�%̙�'��pP��9�A��Bc��3&lK\n;G�Ȳ7���q6+��x]R>6R�\n#ļUJ�r�s#&��\r��{&�`�V|H� #ؿp��\n��.P�=Ö�x>wB�T��a,�J�3�&��8�F��Yb�魂�j갔,@L�xZf��\"P�!�k1�;-x�r�:D���G_בs]jx�Cb(P�{��;�*�Z��<����uiH��KDH�.f�I˴�Z��-(]����)\n�AO��+��aѣ�*�V\n+Ft��0RU⫢�T�\0";break;case"zh-tw":$g="�^��%ӕ\\�r�����|%��:�\$\ns�.e�UȸE9PK72�(�P�h)ʅ@�:i	%��c�Je �R)ܫ{��	Nd T�P���\\��Õ8�C��f4����aS@/%����N����Nd�%гC��ɗB�Q+����B�_MK,�\$���u��ow�f��T9�WK��ʏW����2mizX:P	�*��_/�g*eSLK�ۈ��ι^9�H�\r���7��Zz>�����0)ȿN�\n�r!U=R�\n����^���J��T�O�](��I��^ܫ�]E�J4\$yhr��2^?[���eC�r��^[#�k�֑g1'��)�T'9jB)#�,�%')n䪪�hV���d�=Oa�@�IBO���s�¦K���J��12A\$�&�8mQd���lY�r�%�\0J�ԀD&��H�i��1ġ�D�)*O�\nT�:N0�9D�B+�Ⱕy�L�)pY��@��s�%�^R���pr\$-1M���%DM��x�C��2��R��� SA b������8��!v]��!*��Zsē�G�I�~���Z<^���\\CD=�M�Ei t�e��[:��t�S�\\Y������z\\W��)]%�\\	��jM^��7e�]��a_*���\$Bh�\nb�-�9�.��h��%�rd;�L�C`�92�A�M�L4rD3,r���Q��3�`�瀔���K�H܂t�\$r�M!�a�aA C\$��_�IF�IM�	�<h�NB�AXN��P ��h�7������s�r���ZH��@4C(��C@�:�t��D;�����x�3��(���x�0��Od�A��F�\r|�A��9�+�\$\nD��x��P�2�c�l7k�^�GI��EGM���)�E��\$0�'����7���G���\0���}o^C³\r�Yۂ\"��\"~��J�מ�D��#�Tt\n�&A�:�Tr��,e���z�x_��@�E�N���\"qZ)Ѝ Xv*��p�o(4s���\$!6ɝ\r	��#d�|[�Dؘ��/P���8���_?�Z&P@@PNQE���!Jyo��d,MP�Z���\"`���b���\n��*e|�Y\n�qp ��,�PƲj�a�^�erP�r�@bTG����K`�q�&��	� aL)`@xku��>�&E�&%�r�a\\~�9j����9�0��\0\\6b���(&��sG(���\na9���`噲�9E�o�����r 	�\n��A=�:D��I�\$sB��:D�2�@'�0�y@E\0S��.�CM�ا1,��ጛ3m=&Rd+H1-1�T�^����Ol#@�N�����E�0�	���9��5IE�VT��T��UEs���2x_I�4�%T��)j��9�V�M�J	XY����ϡ!b��p����@xCfa����s�0�'�j%#(u�q�(��XJ�J�=�T*`Z*6��)���)#du�2�]QYz�:����Ar�D�R¨��'�x�V��N�a�AǇg�܊�∄��^V��x\"T�Rj��\\u6�VȠ%6h΁t^IM\"\0�\\	��k\"1����t@�e^��*��r�T���Г�9�2�<TPɗ��x�e����#�|";break;}$Bg=array();foreach(explode("\n",lzw_decompress($g))as$X)$Bg[]=(strpos($X,"\t")?explode("\t",$X):$X);return$Bg;}if(!$Bg){$Bg=get_translations($ba);$_SESSION["translations"]=$Bg;}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$Re=array_search("SQL",$b->operators);if($Re!==false)unset($b->operators[$Re]);}function
dsn($Pb,$V,$E,$B=array()){try{$this->pdo=new
PDO($Pb,$V,$E,$B);}catch(Exception$ec){auth_error(h($ec->getMessage()));}$this->pdo->setAttribute(3,1);$this->pdo->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->pdo->getAttribute(4);}function
quote($Q){return$this->pdo->quote($Q);}function
query($F,$Kg=false){$H=$this->pdo->query($F);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error=lang(21);return
false;}$this->store_result($H);return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($F,$p=0){$H=$this->query($F);if(!$H)return
false;$J=$H->fetch();return$J[$p];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$Mb=array();class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){global$b,$w;$ud=(count($Mc)<count($L));$F=$b->selectQueryBuild($L,$Z,$Mc,$_e,$y,$C);if(!$F)$F="SELECT".limit(($_GET["page"]!="last"&&$y!=""&&$Mc&&$ud&&$w=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Mc&&$ud?"\nGROUP BY ".implode(", ",$Mc):"").($_e?"\nORDER BY ".implode(", ",$_e):""),($y!=""?+$y:null),($C?$y*$C:0),"\n");$Wf=microtime(true);$I=$this->_conn->query($F);if($We)echo$b->selectQuery($F,$Wf,!$I);return$I;}function
delete($R,$G,$y=0){$F="FROM ".table($R);return
queries("DELETE".($y?limit1($R,$F,$G):" $F$G"));}function
update($R,$O,$G,$y=0,$M="\n"){$Zg=array();foreach($O
as$x=>$X)$Zg[]="$x = $X";$F=table($R)." SET$M".implode(",$M",$Zg);return
queries("UPDATE".($y?limit1($R,$F,$G,$M):" $F$G"));}function
insert($R,$O){return
queries("INSERT INTO ".table($R).($O?" (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")":" DEFAULT VALUES"));}function
insertUpdate($R,$K,$Ue){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($F,$qg){}function
convertSearch($t,$X,$p){return$t;}function
value($X,$p){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$p):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($wf){return
q($wf);}function
warnings(){return'';}function
tableHelp($A){}}$Mb["sqlite"]="SQLite 3";$Mb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$Se=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($tc){$this->_link=new
SQLite3($tc);$bh=$this->_link->version();$this->server_info=$bh["versionString"];}function
query($F){$H=@$this->_link->query($F);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($F,$p=0){$H=$this->query($F);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($tc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($tc);}function
query($F,$Kg=false){$de=($Kg?"unbufferedQuery":"query");$H=@$this->_link->$de($F,SQLITE_BOTH,$o);$this->error="";if(!$H){$this->error=$o;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($F,$p=0){$H=$this->query($F);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$x=>$X)$I[($x[0]=='"'?idf_unescape($x):$x)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$A=$this->_result->fieldName($this->_offset++);$Me='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Me\\.)?$Me\$~",$A,$_)){$R=($_[3]!=""?$_[3]:idf_unescape($_[2]));$A=($_[5]!=""?$_[5]:idf_unescape($_[4]));}return(object)array("name"=>$A,"orgname"=>$A,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($tc){$this->dsn(DRIVER.":$tc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($tc){if(is_readable($tc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$tc)?$tc:dirname($_SERVER["SCRIPT_FILENAME"])."/$tc")." AS a")){parent::__construct($tc);$this->query("PRAGMA foreign_keys = 1");$this->query("PRAGMA busy_timeout = 500");return
true;}return
false;}function
multi_query($F){return$this->_result=$this->query($F);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$Ue){$Zg=array();foreach($K
as$O)$Zg[]="(".implode(", ",$O).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Zg));}function
tableHelp($A){if($A=="sqlite_sequence")return"fileformat2.html#seqtab";if($A=="sqlite_master")return"fileformat2.html#$A";}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return
lang(22);return
new
Min_DB;}function
get_databases(){return
array();}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y".($qe?" OFFSET $qe":""):"");}function
limit1($R,$F,$Z,$M="\n"){global$h;return(preg_match('~^INTO~',$F)||$h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($F,$Z,1,0,$M):" $F WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$M."LIMIT 1)");}function
db_collation($m,$fb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($l){return
array();}function
table_status($A=""){global$h;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($A!=""?"AND name = ".q($A):"ORDER BY name"))as$J){$J["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($A!=""?$I[$A]:$I);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$h;$I=array();$Ue="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$J){$A=$J["name"];$U=strtolower($J["type"]);$Db=$J["dflt_value"];$I[$A]=array("field"=>$A,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$Db,$_)?str_replace("''","'",$_[1]):($Db=="NULL"?null:$Db)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($Ue!="")$I[$Ue]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$I[$A]["auto_increment"]=true;$Ue=$A;}}$Tf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Tf,$Ud,PREG_SET_ORDER);foreach($Ud
as$_){$A=str_replace('""','"',preg_replace('~^"|"$~','',$_[1]));if($I[$A])$I[$A]["collation"]=trim($_[3],"'");}return$I;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$I=array();$Tf=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Tf,$_)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$_[1],$Ud,PREG_SET_ORDER);foreach($Ud
as$_){$I[""]["columns"][]=idf_unescape($_[2]).$_[4];$I[""]["descs"][]=(preg_match('~DESC~i',$_[5])?'1':null);}}if(!$I){foreach(fields($R)as$A=>$p){if($p["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($A),"lengths"=>array(),"descs"=>array(null));}}$Uf=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$i);foreach(get_rows("PRAGMA index_list(".table($R).")",$i)as$J){$A=$J["name"];$u=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$u["lengths"]=array();$u["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($A).")",$i)as$vf){$u["columns"][]=$vf["name"];$u["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($A).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Uf[$A],$jf)){preg_match_all('/("[^"]*+")+( DESC)?/',$jf[2],$Ud);foreach($Ud[2]as$x=>$X){if($X)$u["descs"][$x]='1';}}if(!$I[""]||$u["type"]!="UNIQUE"||$u["columns"]!=$I[""]["columns"]||$u["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$A))$I[$A]=$u;}return$I;}function
foreign_keys($R){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$J){$Ec=&$I[$J["id"]];if(!$Ec)$Ec=$J;$Ec["source"][]=$J["from"];$Ec["target"][]=$J["to"];}return$I;}function
view($A){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($A))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($A){global$h;$lc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($lc)\$~",$A)){$h->error=lang(23,str_replace("|",", ",$lc));return
false;}return
true;}function
create_database($m,$d){global$h;if(file_exists($m)){$h->error=lang(24);return
false;}if(!check_sqlite_name($m))return
false;try{$z=new
Min_SQLite($m);}catch(Exception$ec){$h->error=$ec->getMessage();return
false;}$z->query('PRAGMA encoding = "UTF-8"');$z->query('CREATE TABLE adminer (i)');$z->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$h;$h->__construct(":memory:");foreach($l
as$m){if(!@unlink($m)){$h->error=lang(24);return
false;}}return
true;}function
rename_database($A,$d){global$h;if(!check_sqlite_name($A))return
false;$h->__construct(":memory:");$h->error=lang(24);return@rename(DB,$A);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){global$h;$Vg=($R==""||$Bc);foreach($q
as$p){if($p[0]!=""||!$p[1]||$p[2]){$Vg=true;break;}}$c=array();$Ce=array();foreach($q
as$p){if($p[1]){$c[]=($Vg?$p[1]:"ADD ".implode($p[1]));if($p[0]!="")$Ce[$p[0]]=$p[1][0];}}if(!$Vg){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$A&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($A)))return
false;}elseif(!recreate_table($R,$A,$c,$Ce,$Bc,$Ga))return
false;if($Ga){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Ga WHERE name = ".q($A));if(!$h->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($A).", $Ga)");queries("COMMIT");}return
true;}function
recreate_table($R,$A,$q,$Ce,$Bc,$Ga,$v=array()){global$h;if($R!=""){if(!$q){foreach(fields($R)as$x=>$p){if($v)$p["auto_increment"]=0;$q[]=process_field($p,$p);$Ce[$x]=idf_escape($x);}}$Ve=false;foreach($q
as$p){if($p[6])$Ve=true;}$Ob=array();foreach($v
as$x=>$X){if($X[2]=="DROP"){$Ob[$X[1]]=true;unset($v[$x]);}}foreach(indexes($R)as$_d=>$u){$f=array();foreach($u["columns"]as$x=>$e){if(!$Ce[$e])continue
2;$f[]=$Ce[$e].($u["descs"][$x]?" DESC":"");}if(!$Ob[$_d]){if($u["type"]!="PRIMARY"||!$Ve)$v[]=array($u["type"],$_d,$f);}}foreach($v
as$x=>$X){if($X[0]=="PRIMARY"){unset($v[$x]);$Bc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$_d=>$Ec){foreach($Ec["source"]as$x=>$e){if(!$Ce[$e])continue
2;$Ec["source"][$x]=idf_unescape($Ce[$e]);}if(!isset($Bc[" $_d"]))$Bc[]=" ".format_foreign_key($Ec);}queries("BEGIN");}foreach($q
as$x=>$p)$q[$x]="  ".implode($p);$q=array_merge($q,array_filter($Bc));$kg=($R==$A?"adminer_$A":$A);if(!queries("CREATE TABLE ".table($kg)." (\n".implode(",\n",$q)."\n)"))return
false;if($R!=""){if($Ce&&!queries("INSERT INTO ".table($kg)." (".implode(", ",$Ce).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Ce)))." FROM ".table($R)))return
false;$Hg=array();foreach(triggers($R)as$Fg=>$rg){$Eg=trigger($Fg);$Hg[]="CREATE TRIGGER ".idf_escape($Fg)." ".implode(" ",$rg)." ON ".table($A)."\n$Eg[Statement]";}$Ga=$Ga?0:$h->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($R));if(!queries("DROP TABLE ".table($R))||($R==$A&&!queries("ALTER TABLE ".table($kg)." RENAME TO ".table($A)))||!alter_indexes($A,$v))return
false;if($Ga)queries("UPDATE sqlite_sequence SET seq = $Ga WHERE name = ".q($A));foreach($Hg
as$Eg){if(!queries($Eg))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$A,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($A!=""?$A:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$Ue){if($Ue[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($dh){return
apply_queries("DROP VIEW",$dh);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$dh,$jg){return
false;}function
trigger($A){global$h;if($A=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$t='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Gg=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$t\\s*(".implode("|",$Gg["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($t))?\\s+ON\\s*$t\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($A)),$_);$pe=$_[3];return
array("Timing"=>strtoupper($_[1]),"Event"=>strtoupper($_[2]).($pe?" OF":""),"Of"=>($pe[0]=='`'||$pe[0]=='"'?idf_unescape($pe):$pe),"Trigger"=>$A,"Statement"=>$_[4],);}function
triggers($R){$I=array();$Gg=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$J){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Gg["Timing"]).')\s*(.*?)\s+ON\b~i',$J["sql"],$_);$I[$J["name"]]=array($_[1],$_[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$F){return$h->query("EXPLAIN QUERY PLAN $F");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($yf){return
true;}function
create_sql($R,$Ga,$ag){global$h;$I=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$A=>$u){if($A=='')continue;$I.=";\n\n".index_sql($R,$u['type'],$A,"(".implode(", ",array_map('idf_escape',$u['columns'])).")");}return$I;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($k){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$h;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$x)$I[$x]=$h->result("PRAGMA $x");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$ye){list($x,$X)=explode("=",$ye,2);$I[$x]=$X;}return$I;}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
support($pc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$pc);}$w="sqlite";$Jg=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Zf=array_keys($Jg);$Qg=array();$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Lc=array("hex","length","lower","round","unixepoch","upper");$Pc=array("avg","count","count distinct","group_concat","max","min","sum");$Rb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Mb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$Se=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($bc,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($N,$V,$E){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($E,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$bh=pg_version($this->_link);$this->server_info=$bh["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$p){return($p["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($k){global$b;if($k==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($k,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($F,$Kg=false){$H=@pg_query($this->_link,$F);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);$I=false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);$I=true;}else$I=new
Min_Result($H);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$I;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=0){$H=$this->query($F);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$p);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$e);$I->name=pg_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$e);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($N,$V,$E){global$b;$m=$b->database();$this->dsn("pgsql:host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' client_encoding=utf8 dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",$V,$E);return
true;}function
select_db($k){global$b;return($b->database()==$k);}function
quoteBinary($wf){return
q($wf);}function
query($F,$Kg=false){$I=parent::query($F,$Kg);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$I;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$Ue){global$h;foreach($K
as$O){$Rg=array();$Z=array();foreach($O
as$x=>$X){$Rg[]="$x = $X";if(isset($Ue[idf_unescape($x)]))$Z[]="$x = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Rg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).")")))return
false;}return
true;}function
slowQuery($F,$qg){$this->_conn->query("SET statement_timeout = ".(1000*$qg));$this->_conn->timeout=1000*$qg;return$F;}function
convertSearch($t,$X,$p){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$p["type"])?$t:"CAST($t AS text)");}function
quoteBinary($wf){return$this->_conn->quoteBinary($wf);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($A){$Md=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$z=$Md[$_GET["ns"]];if($z)return"$z-".str_replace("_","-",$A).".html";}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b,$Jg,$Zf;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){if(min_version(9,0,$h)){$h->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$h)){$Zf[lang(25)][]="json";$Jg["json"]=4294967295;if(min_version(9.4,0,$h)){$Zf[lang(25)][]="jsonb";$Jg["jsonb"]=4294967295;}}}return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y".($qe?" OFFSET $qe":""):"");}function
limit1($R,$F,$Z,$M="\n"){return(preg_match('~^INTO~',$F)?limit($F,$Z,1,0,$M):" $F".(is_view(table_status1($R))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$M."LIMIT 1)"));}function
db_collation($m,$fb){global$h;return$h->result("SELECT datcollate FROM pg_database WHERE datname = ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$F="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$F.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$F.="
ORDER BY 1";return
get_key_vals($F);}function
count_tables($l){return
array();}function
table_status($A=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f', 'p')
".($A!=""?"AND relname = ".q($A):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($A!=""?$I[$A]:$I);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$I=array();$xa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);$cd=min_version(10)?'a.attidentity':'0';foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment, $cd AS identity
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$_);list(,$U,$Jd,$J["length"],$sa,$za)=$_;$J["length"].=$za;$Wa=$U.$sa;if(isset($xa[$Wa])){$J["type"]=$xa[$Wa];$J["full_type"]=$J["type"].$Jd.$za;}else{$J["type"]=$U;$J["full_type"]=$J["type"].$Jd.$sa.$za;}if(in_array($J['identity'],array('a','d')))$J['default']='GENERATED '.($J['identity']=='d'?'BY DEFAULT':'ALWAYS').' AS IDENTITY';$J["null"]=!$J["attnotnull"];$J["auto_increment"]=$J['identity']||preg_match('~^nextval\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$J["default"],$_))$J["default"]=($_[1]=="NULL"?null:(($_[1][0]=="'"?idf_unescape($_[1]):$_[1]).$_[2]));$I[$J["field"]]=$J;}return$I;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$I=array();$hg=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $hg AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $hg AND ci.oid = i.indexrelid",$i)as$J){$kf=$J["relname"];$I[$kf]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$kf]["columns"]=array();foreach(explode(" ",$J["indkey"])as$kd)$I[$kf]["columns"][]=$f[$kd];$I[$kf]["descs"]=array();foreach(explode(" ",$J["indoption"])as$ld)$I[$kf]["descs"][]=($ld&1?'1':null);$I[$kf]["lengths"]=array();}return$I;}function
foreign_keys($R){global$se;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$_)){$J['source']=array_map('trim',explode(',',$_[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$_[2],$Td)){$J['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Td[2]));$J['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Td[4]));}$J['target']=array_map('trim',explode(',',$_[3]));$J['on_delete']=(preg_match("~ON DELETE ($se)~",$_[4],$Td)?$Td[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($se)~",$_[4],$Td)?$Td[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
constraints($R){global$se;$I=array();foreach(get_rows("SELECT conname, consrc
FROM pg_catalog.pg_constraint
INNER JOIN pg_catalog.pg_namespace ON pg_constraint.connamespace = pg_namespace.oid
INNER JOIN pg_catalog.pg_class ON pg_constraint.conrelid = pg_class.oid AND pg_constraint.connamespace = pg_class.relnamespace
WHERE pg_constraint.contype = 'c'
AND conrelid != 0 -- handle only CONSTRAINTs here, not TYPES
AND nspname = current_schema()
AND relname = ".q($R)."
ORDER BY connamespace, conname")as$J)$I[$J['conname']]=$J['consrc'];return$I;}function
view($A){global$h;return
array("select"=>trim($h->result("SELECT pg_get_viewdef(".$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($A)).")")));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$h;$I=h($h->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$I,$_))$I=$_[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($_[3]).'})(.*)~','\1<b>\2</b>',$_[2]).$_[4];return
nl_br($I);}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($l){global$h;$h->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($A,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($A));}function
auto_increment(){return(min_version(11)?" PRIMARY KEY":"");}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=array();$cf=array();if($R!=""&&$R!=$A)$cf[]="ALTER TABLE ".table($R)." RENAME TO ".table($A);foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c[]="DROP $e";else{$Yg=$X[5];unset($X[5]);if(isset($X[6])&&$p[0]=="")$X[1]=($X[1]==" bigint"?" big":($X[1]==" smallint"?" small":" "))."serial";if($p[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$cf[]="ALTER TABLE ".table($A)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($p[0]!=""||$Yg!="")$cf[]="COMMENT ON COLUMN ".table($A).".$X[0] IS ".($Yg!=""?substr($Yg,9):"''");}}$c=array_merge($c,$Bc);if($R=="")array_unshift($cf,"CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($cf,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""||$jb!="")$cf[]="COMMENT ON TABLE ".table($A)." IS ".q($jb);if($Ga!=""){}foreach($cf
as$F){if(!queries($F))return
false;}return
true;}function
alter_indexes($R,$c){$vb=array();$Nb=array();$cf=array();foreach($c
as$X){if($X[0]!="INDEX")$vb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Nb[]=idf_escape($X[1]);else$cf[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($vb)array_unshift($cf,"ALTER TABLE ".table($R).implode(",",$vb));if($Nb)array_unshift($cf,"DROP INDEX ".implode(", ",$Nb));foreach($cf
as$F){if(!queries($F))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($dh){return
drop_tables($dh);}function
drop_tables($T){foreach($T
as$R){$P=table_status($R);if(!queries("DROP ".strtoupper($P["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$dh,$jg){foreach(array_merge($T,$dh)as$R){$P=table_status($R);if(!queries("ALTER ".strtoupper($P["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($jg)))return
false;}return
true;}function
trigger($A,$R=null){if($A=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$K=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($A));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$J)$I[$J["trigger_name"]]=array($J["action_timing"],$J["event_manipulation"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($A,$U){$K=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($A));$I=$K[0];$I["returns"]=array("type"=>$I["type_udt_name"]);$I["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($A).'
ORDER BY ordinal_position');return$I;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($A,$J){$I=array();foreach($J["fields"]as$p)$I[]=$p["type"];return
idf_escape($A)."(".implode(", ",$I).")";}function
last_id(){return
0;}function
explain($h,$F){return$h->query("EXPLAIN $F");}function
found_rows($S,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$jf))return$jf[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($xf,$i=null){global$h,$Jg,$Zf;if(!$i)$i=$h;$I=$i->query("SET search_path TO ".idf_escape($xf));foreach(types()as$U){if(!isset($Jg[$U])){$Jg[$U]=0;$Zf[lang(26)][]=$U;}}return$I;}function
foreign_keys_sql($R){$I="";$P=table_status($R);$zc=foreign_keys($R);ksort($zc);foreach($zc
as$yc=>$xc)$I.="ALTER TABLE ONLY ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." ADD CONSTRAINT ".idf_escape($yc)." $xc[definition] ".($xc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE').";\n";return($I?"$I\n":$I);}function
create_sql($R,$Ga,$ag){global$h;$I='';$tf=array();$Gf=array();$P=table_status($R);if(is_view($P)){$ch=view($R);return
rtrim("CREATE VIEW ".idf_escape($R)." AS $ch[select]",";");}$q=fields($R);$v=indexes($R);ksort($v);$rb=constraints($R);if(!$P||empty($q))return
false;$I="CREATE TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." (\n    ";foreach($q
as$qc=>$p){$Ie=idf_escape($p['field']).' '.$p['full_type'].default_value($p).($p['attnotnull']?" NOT NULL":"");$tf[]=$Ie;if(preg_match('~nextval\(\'([^\']+)\'\)~',$p['default'],$Ud)){$Ff=$Ud[1];$Sf=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($Ff):"SELECT * FROM $Ff"));$Gf[]=($ag=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $Ff;\n":"")."CREATE SEQUENCE $Ff INCREMENT $Sf[increment_by] MINVALUE $Sf[min_value] MAXVALUE $Sf[max_value] START ".($Ga?$Sf['last_value']:1)." CACHE $Sf[cache_value];";}}if(!empty($Gf))$I=implode("\n\n",$Gf)."\n\n$I";foreach($v
as$fd=>$u){switch($u['type']){case'UNIQUE':$tf[]="CONSTRAINT ".idf_escape($fd)." UNIQUE (".implode(', ',array_map('idf_escape',$u['columns'])).")";break;case'PRIMARY':$tf[]="CONSTRAINT ".idf_escape($fd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$u['columns'])).")";break;}}foreach($rb
as$nb=>$pb)$tf[]="CONSTRAINT ".idf_escape($nb)." CHECK $pb";$I.=implode(",\n    ",$tf)."\n) WITH (oids = ".($P['Oid']?'true':'false').");";foreach($v
as$fd=>$u){if($u['type']=='INDEX'){$f=array();foreach($u['columns']as$x=>$X)$f[]=idf_escape($X).($u['descs'][$x]?" DESC":"");$I.="\n\nCREATE INDEX ".idf_escape($fd)." ON ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." USING btree (".implode(', ',$f).");";}}if($P['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." IS ".q($P['Comment']).";";foreach($q
as$qc=>$p){if($p['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($P['nspname']).".".idf_escape($P['Name']).".".idf_escape($qc)." IS ".q($p['comment']).";";}return
rtrim($I,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$P=table_status($R);$I="";foreach(triggers($R)as$Dg=>$Cg){$Eg=trigger($Dg,$P['Name']);$I.="\nCREATE TRIGGER ".idf_escape($Eg['Trigger'])." $Eg[Timing] $Eg[Events] ON ".idf_escape($P["nspname"]).".".idf_escape($P['Name'])." $Eg[Type] $Eg[Statement];;\n";}return$I;}function
use_sql($k){return"\connect ".idf_escape($k);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
support($pc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$pc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$h;return$h->result("SHOW max_connections");}$w="pgsql";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(28)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(25)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(29)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(30)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(31)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array();$xe=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Lc=array("char_length","lower","round","to_hex","to_timestamp","upper");$Pc=array("avg","count","count distinct","max","min","sum");$Rb=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Mb["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$Se=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($bc,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($N,$V,$E){$this->_link=@oci_new_connect($V,$E,$N,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$o=oci_error();$this->error=$o["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
true;}function
query($F,$Kg=false){$H=oci_parse($this->_link,$F);$this->error="";if(!$H){$o=oci_error($this->_link);$this->errno=$o["code"];$this->error=$o["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);}return$I;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=1){$H=$this->query($F);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$p);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$x=>$X){if(is_a($X,'OCI-Lob'))$J[$x]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$e);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($N,$V,$E){$this->dsn("oci:dbname=//$N;charset=AL32UTF8",$V,$E);return
true;}function
select_db($k){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($F,$Z,$y,$qe=0,$M=" "){return($qe?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $F$Z) t WHERE rownum <= ".($y+$qe).") WHERE rnum > $qe":($y!==null?" * FROM (SELECT $F$Z) WHERE rownum <= ".($y+$qe):" $F$Z"));}function
limit1($R,$F,$Z,$M="\n"){return" $F$Z";}function
db_collation($m,$fb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($A=""){$I=array();$zf=q($A);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($A!=""?" AND table_name = $zf":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($A!=""?" WHERE view_name = $zf":"")."
ORDER BY 1")as$J){if($A!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$I=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$J){$U=$J["DATA_TYPE"];$Jd="$J[DATA_PRECISION],$J[DATA_SCALE]";if($Jd==",")$Jd=$J["DATA_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$U.($Jd?"($Jd)":""),"type"=>strtolower($U),"length"=>$Jd,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($R,$i=null){$I=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$J){$fd=$J["INDEX_NAME"];$I[$fd]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$fd]["columns"][]=$J["COLUMN_NAME"];$I[$fd]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$fd]["descs"][]=($J["DESCEND"]?'1':null);}return$I;}function
view($A){$K=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($A));return
reset($K);}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$F){$h->query("EXPLAIN PLAN FOR $F");return$h->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=$Nb=array();foreach($q
as$p){$X=$p[1];if($X&&$p[0]!=""&&idf_escape($p[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($p[0])." TO $X[0]");if($X)$c[]=($R!=""?($p[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$Nb[]=idf_escape($p[0]);}if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$Nb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$Nb).")"))&&($R==$A||queries("ALTER TABLE ".table($R)." RENAME TO ".table($A)));}function
foreign_keys($R){$I=array();$F="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($F)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($dh){return
apply_queries("DROP VIEW",$dh);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($yf,$i=null){global$h;if(!$i)$i=$h;return$i->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($yf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
support($pc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$pc);}$w="oracle";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(28)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(25)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(29)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array();$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Lc=array("length","lower","round","upper");$Pc=array("avg","count","count distinct","max","min","sum");$Rb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Mb["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$Se=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$o){$this->errno=$o["code"];$this->error.="$o[message]\n";}$this->error=rtrim($this->error);}function
connect($N,$V,$E){global$b;$m=$b->database();$ob=array("UID"=>$V,"PWD"=>$E,"CharacterSet"=>"UTF-8");if($m!="")$ob["Database"]=$m;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$N),$ob);if($this->_link){$md=sqlsrv_server_info($this->_link);$this->server_info=$md['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($F,$Kg=false){$H=sqlsrv_query($this->_link,$F);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($F){$this->_result=sqlsrv_query($this->_link,$F);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($F,$p=0){$H=$this->query($F);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$p];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$x=>$X){if(is_a($X,'DateTime'))$J[$x]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$p=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$p["Name"];$I->orgname=$p["Name"];$I->type=($p["Type"]==1?254:0);return$I;}function
seek($qe){for($r=0;$r<$qe;$r++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($N,$V,$E){$this->_link=@mssql_connect($N,$V,$E);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($H){$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
mssql_select_db($k);}function
query($F,$Kg=false){$H=@mssql_query($F,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($F,$p=0){$H=$this->query($F);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$p);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($qe){mssql_data_seek($this->_result,$qe);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($N,$V,$E){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$N)),$V,$E);return
true;}function
select_db($k){return$this->query("USE ".idf_escape($k));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$Ue){foreach($K
as$O){$Rg=array();$Z=array();foreach($O
as$x=>$X){$Rg[]="$x = $X";if(isset($Ue[idf_unescape($x)]))$Z[]="$x = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$O).")) AS source (c".implode(", c",range(1,count($O))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Rg)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($t){return"[".str_replace("]","]]",$t)."]";}function
table($t){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($F,$Z,$y,$qe=0,$M=" "){return($y!==null?" TOP (".($y+$qe).")":"")." $F$Z";}function
limit1($R,$F,$Z,$M="\n"){return
limit($F,$Z,1,0,$M);}function
db_collation($m,$fb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name = ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($l){global$h;$I=array();foreach($l
as$m){$h->select_db($m);$I[$m]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($A=""){$I=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($A!=""?"AND name = ".q($A):"ORDER BY name"))as$J){if($A!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$kb=get_key_vals("SELECT objname, cast(value as varchar(max)) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($R).", 'column', NULL)");$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$J){$U=$J["type"];$Jd=(preg_match("~char|binary~",$U)?$J["max_length"]:($U=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$U.($Jd?"($Jd)":""),"type"=>$U,"length"=>$Jd,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],"comment"=>$kb[$J["name"]],);}return$I;}function
indexes($R,$i=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$i)as$J){$A=$J["name"];$I[$A]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$A]["lengths"]=array();$I[$A]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$A]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
view($A){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($A))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$I[preg_replace('~_.*~','',$d)][]=$d;return$I;}function
information_schema($m){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$h->error)));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($l){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$l)));}function
rename_database($A,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($A));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=array();$kb=array();foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$kb[$p[0]]=$X[5];unset($X[5]);if($p[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($Bc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($A)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$A)queries("EXEC sp_rename ".q(table($R)).", ".q($A));if($Bc)$c[""]=$Bc;foreach($c
as$x=>$X){if(!queries("ALTER TABLE ".idf_escape($A)." $x".implode(",",$X)))return
false;}foreach($kb
as$x=>$X){$jb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($A).", @level2type = N'Column', @level2name = ".q($x));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$jb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($A).", @level2type = N'Column', @level2name = ".q($x));}return
true;}function
alter_indexes($R,$c){$u=array();$Nb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Nb[]=idf_escape($X[1]);else$u[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$u||queries("DROP INDEX ".implode(", ",$u)))&&(!$Nb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$Nb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$F){$h->query("SET SHOWPLAN_ALL ON");$I=$h->query($F);$h->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($S,$Z){}function
foreign_keys($R){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$J){$Ec=&$I[$J["FK_NAME"]];$Ec["db"]=$J["PKTABLE_QUALIFIER"];$Ec["table"]=$J["PKTABLE_NAME"];$Ec["source"][]=$J["FKCOLUMN_NAME"];$Ec["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($dh){return
queries("DROP VIEW ".implode(", ",array_map('table',$dh)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$dh,$jg){return
apply_queries("ALTER SCHEMA ".idf_escape($jg)." TRANSFER",array_merge($T,$dh));}function
trigger($A){if($A=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($A));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$I["text"]);return$I;}function
triggers($R){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($xf){return
true;}function
use_sql($k){return"USE ".idf_escape($k);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
support($pc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$pc);}$w="mssql";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(28)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(25)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(29)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array();$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Lc=array("len","lower","round","upper");$Pc=array("avg","count","count distinct","max","min","sum");$Rb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Mb['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$Se=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$E){$this->_link=ibase_connect($N,$V,$E);if($this->_link){$Ug=explode(':',$N);$this->service_link=ibase_service_attach($Ug[0],$V,$E);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return($k=="domain");}function
query($F,$Kg=false){$H=ibase_query($F,$this->_link);if(!$H){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($H===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=0){$H=$this->query($F);if(!$H||!$H->num_rows)return
false;$J=$H->fetch_row();return$J[$p];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$p=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$p['name'],'orgname'=>$p['name'],'type'=>$p['type'],'charsetnr'=>$p['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($_c){return
array("domain");}function
limit($F,$Z,$y,$qe=0,$M=" "){$I='';$I.=($y!==null?$M."FIRST $y".($qe?" SKIP $qe":""):"");$I.=" $F$Z";return$I;}function
limit1($R,$F,$Z,$M="\n"){return
limit($F,$Z,1,0,$M);}function
db_collation($m,$fb){}function
engines(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){global$h;$F='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$H=ibase_query($h->_link,$F);$I=array();while($J=ibase_fetch_assoc($H))$I[$J['RDB$RELATION_NAME']]='table';ksort($I);return$I;}function
count_tables($l){return
array();}function
table_status($A="",$oc=false){global$h;$I=array();$_b=tables_list();foreach($_b
as$u=>$X){$u=trim($u);$I[$u]=array('Name'=>$u,'Engine'=>'standard',);if($A==$u)return$I[$u];}return$I;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$h;$I=array();$F='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($R).'
ORDER BY r.RDB$FIELD_POSITION';$H=ibase_query($h->_link,$F);while($J=ibase_fetch_assoc($H))$I[trim($J['FIELD_NAME'])]=array("field"=>trim($J["FIELD_NAME"]),"full_type"=>trim($J["FIELD_TYPE"]),"type"=>trim($J["FIELD_SUB_TYPE"]),"default"=>trim($J['FIELD_DEFAULT_VALUE']),"null"=>(trim($J["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($J["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($J["FIELD_DESCRIPTION"]),);return$I;}function
indexes($R,$i=null){$I=array();return$I;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($xf){return
true;}function
support($pc){return
preg_match("~^(columns|sql|status|table)$~",$pc);}$w="firebird";$xe=array("=");$Lc=array();$Pc=array();$Rb=array();}$Mb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$Se=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($k){return($k=="domain");}function
query($F,$Kg=false){$D=array('SelectExpression'=>$F,'ConsistentRead'=>'true');if($this->next)$D['NextToken']=$this->next;$H=sdb_request_all('Select','Item',$D,$this->timeout);$this->timeout=0;if($H===false)return$H;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$F)){$dg=0;foreach($H
as$wd)$dg+=$wd->Attribute->Value;$H=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$dg,))));}return
new
Min_Result($H);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($H){foreach($H
as$wd){$J=array();if($wd->Name!='')$J['itemName()']=(string)$wd->Name;foreach($wd->Attribute
as$Ca){$A=$this->_processValue($Ca->Name);$Y=$this->_processValue($Ca->Value);if(isset($J[$A])){$J[$A]=(array)$J[$A];$J[$A][]=$Y;}else$J[$A]=$Y;}$this->_rows[]=$J;foreach($J
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Tb){return(is_object($Tb)&&$Tb['encoding']=='base64'?base64_decode($Tb):(string)$Tb);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$x=>$X)$I[$x]=$J[$x];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$Ad=array_keys($this->_rows[0]);return(object)array('name'=>$Ad[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$Ue="itemName()";function
_chunkRequest($dd,$ra,$D,$hc=array()){global$h;foreach(array_chunk($dd,25)as$Za){$He=$D;foreach($Za
as$r=>$s){$He["Item.$r.ItemName"]=$s;foreach($hc
as$x=>$X)$He["Item.$r.$x"]=$X;}if(!sdb_request($ra,$He))return
false;}$h->affected_rows=count($dd);return
true;}function
_extractIds($R,$G,$y){$I=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$G,$Ud))$I=array_map('idf_unescape',$Ud[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$G.($y?" LIMIT 1":"")))as$wd)$I[]=$wd->Name;}return$I;}function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){global$h;$h->next=$_GET["next"];$I=parent::select($R,$L,$Z,$Mc,$_e,$y,$C,$We);$h->next=0;return$I;}function
delete($R,$G,$y=0){return$this->_chunkRequest($this->_extractIds($R,$G,$y),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$O,$G,$y=0,$M="\n"){$Eb=array();$qd=array();$r=0;$dd=$this->_extractIds($R,$G,$y);$s=idf_unescape($O["`itemName()`"]);unset($O["`itemName()`"]);foreach($O
as$x=>$X){$x=idf_unescape($x);if($X=="NULL"||($s!=""&&array($s)!=$dd))$Eb["Attribute.".count($Eb).".Name"]=$x;if($X!="NULL"){foreach((array)$X
as$xd=>$W){$qd["Attribute.$r.Name"]=$x;$qd["Attribute.$r.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$xd)$qd["Attribute.$r.Replace"]="true";$r++;}}}$D=array('DomainName'=>$R);return(!$qd||$this->_chunkRequest(($s!=""?array($s):$dd),'BatchPutAttributes',$D,$qd))&&(!$Eb||$this->_chunkRequest($dd,'BatchDeleteAttributes',$D,$Eb));}function
insert($R,$O){$D=array("DomainName"=>$R);$r=0;foreach($O
as$A=>$Y){if($Y!="NULL"){$A=idf_unescape($A);if($A=="itemName()")$D["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$D["Attribute.$r.Name"]=$A;$D["Attribute.$r.Value"]=(is_array($Y)?$X:idf_unescape($Y));$r++;}}}}return
sdb_request('PutAttributes',$D);}function
insertUpdate($R,$K,$Ue){foreach($K
as$O){if(!$this->update($R,$O,"WHERE `itemName()` = ".q($O["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($F,$qg){$this->_conn->timeout=$qg;return$F;}}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return
lang(22);return
new
Min_DB;}function
support($pc){return
preg_match('~sql~',$pc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$fb){}function
tables_list(){global$h;$I=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$I[(string)$R]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$I;}function
table_status($A="",$oc=false){$I=array();foreach(($A!=""?array($A=>true):tables_list())as$R=>$U){$J=array("Name"=>$R,"Auto_increment"=>"");if(!$oc){$ce=sdb_request('DomainMetadata',array('DomainName'=>$R));if($ce){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$x=>$X)$J[$x]=(string)$ce->$X;}}if($A!="")return$J;$I[$R]=$J;}return$I;}function
explain($h,$F){}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($t){return
idf_escape($t);}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y":"");}function
unconvert_field($p,$I){return$I;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$A)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($wa,$_b,$x,$gf=false){$Pa=64;if(strlen($x)>$Pa)$x=pack("H*",$wa($x));$x=str_pad($x,$Pa,"\0");$yd=$x^str_repeat("\x36",$Pa);$zd=$x^str_repeat("\x5C",$Pa);$I=$wa($zd.pack("H*",$wa($yd.$_b)));if($gf)$I=pack("H*",$I);return$I;}function
sdb_request($ra,$D=array()){global$b,$h;list($Zc,$D['AWSAccessKeyId'],$_f)=$b->credentials();$D['Action']=$ra;$D['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$D['Version']='2009-04-15';$D['SignatureVersion']=2;$D['SignatureMethod']='HmacSHA1';ksort($D);$F='';foreach($D
as$x=>$X)$F.='&'.rawurlencode($x).'='.rawurlencode($X);$F=str_replace('%7E','~',substr($F,1));$F.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Zc)."\n/\n$F",$_f,true)));@ini_set('track_errors',1);$sc=@file_get_contents((preg_match('~^https?://~',$Zc)?$Zc:"http://$Zc"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$F,'ignore_errors'=>1,))));if(!$sc){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$oh=simplexml_load_string($sc);if(!$oh){$o=libxml_get_last_error();$h->error=$o->message;return
false;}if($oh->Errors){$o=$oh->Errors->Error;$h->error="$o->Message ($o->Code)";return
false;}$h->error='';$ig=$ra."Result";return($oh->$ig?$oh->$ig:true);}function
sdb_request_all($ra,$ig,$D=array(),$qg=0){$I=array();$Wf=($qg?microtime(true):0);$y=(preg_match('~LIMIT\s+(\d+)\s*$~i',$D['SelectExpression'],$_)?$_[1]:0);do{$oh=sdb_request($ra,$D);if(!$oh)break;foreach($oh->$ig
as$Tb)$I[]=$Tb;if($y&&count($I)>=$y){$_GET["next"]=$oh->NextToken;break;}if($qg&&microtime(true)-$Wf>$qg)return
false;$D['NextToken']=$oh->NextToken;if($y)$D['SelectExpression']=preg_replace('~\d+\s*$~',$y-count($I),$D['SelectExpression']);}while($oh->NextToken);return$I;}$w="simpledb";$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$Lc=array();$Pc=array("count");$Rb=array(array("json"));}$Mb["mongo"]="MongoDB";if(isset($_GET["mongo"])){$Se=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Sg,$B){$bb='MongoDB\Driver\Manager';return
new$bb($Sg,$B);}function
query($F){return
false;}function
select_db($k){$this->_db_name=$k;return
true;}function
quote($Q){return$Q;}function
ping($z){$bb='MongoDB\Driver\Command';$z->executeCommand('admin',new$bb(array('ping'=>1)));}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$wd){$J=array();foreach($wd
as$x=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$x]=63;$J[$x]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=$H->count;}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$x=>$X)$I[$x]=$J[$x];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$Ad=array_keys($this->_rows[0]);$A=$Ad[$this->_offset++];return(object)array('name'=>$A,'charsetnr'=>$this->_charset[$A],);}}class
Min_Driver
extends
Min_SQL{public$Ue="_id";function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){global$h;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$Pf=array();foreach($_e
as$X){$X=preg_replace('~ DESC$~','',$X,1,$ub);$Pf[$X]=($ub?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$y=$_GET['limit'];$y=min(200,max(1,(int)$y));$Mf=$C*$y;$bb='MongoDB\Driver\Query';$F=new$bb($Z,array('projection'=>$L,'limit'=>$y,'skip'=>$Mf,'sort'=>$Pf));$sf=$h->_link->executeQuery("$h->_db_name.$R",$F);return
new
Min_Result($sf);}function
update($R,$O,$G,$y=0,$M="\n"){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($G);$bb='MongoDB\Driver\BulkWrite';$Ta=new$bb(array());if(isset($O['_id']))unset($O['_id']);$lf=array();foreach($O
as$x=>$Y){if($Y=='NULL'){$lf[$x]=1;unset($O[$x]);}}$Rg=array('$set'=>$O);if(count($lf))$Rg['$unset']=$lf;$Ta->update($Z,$Rg,array('upsert'=>false));$sf=$h->_link->executeBulkWrite("$m.$R",$Ta);$h->affected_rows=$sf->getModifiedCount();return
true;}function
delete($R,$G,$y=0){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($G);$bb='MongoDB\Driver\BulkWrite';$Ta=new$bb(array());$Ta->delete($Z,array('limit'=>$y));$sf=$h->_link->executeBulkWrite("$m.$R",$Ta);$h->affected_rows=$sf->getDeletedCount();return
true;}function
insert($R,$O){global$h;$m=$h->_db_name;$bb='MongoDB\Driver\BulkWrite';$Ta=new$bb(array());if(isset($O['_id'])&&empty($O['_id']))unset($O['_id']);$Ta->insert($O);$sf=$h->_link->executeBulkWrite("$m.$R",$Ta);$h->affected_rows=$sf->getInsertedCount();return
true;}}function
get_databases($_c){global$h;$I=array();$bb='MongoDB\Driver\Command';$ib=new$bb(array('listDatabases'=>1));$sf=$h->_link->executeCommand('admin',$ib);foreach($sf
as$Bb){foreach($Bb->databases
as$m)$I[]=$m->name;}return$I;}function
count_tables($l){$I=array();return$I;}function
tables_list(){global$h;$bb='MongoDB\Driver\Command';$ib=new$bb(array('listCollections'=>1));$sf=$h->_link->executeCommand($h->_db_name,$ib);$gb=array();foreach($sf
as$H)$gb[$H->name]='table';return$gb;}function
drop_databases($l){return
false;}function
indexes($R,$i=null){global$h;$I=array();$bb='MongoDB\Driver\Command';$ib=new$bb(array('listIndexes'=>$R));$sf=$h->_link->executeCommand($h->_db_name,$ib);foreach($sf
as$u){$Hb=array();$f=array();foreach(get_object_vars($u->key)as$e=>$U){$Hb[]=($U==-1?'1':null);$f[]=$e;}$I[$u->name]=array("type"=>($u->name=="_id_"?"PRIMARY":(isset($u->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Hb,);}return$I;}function
fields($R){$q=fields_from_edit();if(!count($q)){global$n;$H=$n->select($R,array("*"),null,null,array(),10);while($J=$H->fetch_assoc()){foreach($J
as$x=>$X){$J[$x]=null;$q[$x]=array("field"=>$x,"type"=>"string","null"=>($x!=$n->primary),"auto_increment"=>($x==$n->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$q;}function
found_rows($S,$Z){global$h;$Z=where_to_query($Z);$bb='MongoDB\Driver\Command';$ib=new$bb(array('count'=>$S['Name'],'query'=>$Z));$sf=$h->_link->executeCommand($h->_db_name,$ib);$xg=$sf->toArray();return$xg[0]->n;}function
sql_query_where_parser($G){$G=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$G));$G=preg_replace('/\)\)\)$/',')',$G);$lh=explode(' AND ',$G);$mh=explode(') OR (',$G);$Z=array();foreach($lh
as$jh)$Z[]=trim($jh);if(count($mh)==1)$mh=array();elseif(count($mh)>1)$Z=array();return
where_to_query($Z,$mh);}function
where_to_query($hh=array(),$ih=array()){global$b;$_b=array();foreach(array('and'=>$hh,'or'=>$ih)as$U=>$Z){if(is_array($Z)){foreach($Z
as$ic){list($eb,$ve,$X)=explode(" ",$ic,3);if($eb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$bb='MongoDB\BSON\ObjectID';$X=new$bb($X);}if(!in_array($ve,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$ve,$_)){$X=(float)$X;$ve=$_[1];}elseif(preg_match('~^\(date\)(.+)~',$ve,$_)){$Ab=new
DateTime($X);$bb='MongoDB\BSON\UTCDatetime';$X=new$bb($Ab->getTimestamp()*1000);$ve=$_[1];}switch($ve){case'=':$ve='$eq';break;case'!=':$ve='$ne';break;case'>':$ve='$gt';break;case'<':$ve='$lt';break;case'>=':$ve='$gte';break;case'<=':$ve='$lte';break;case'regex':$ve='$regex';break;default:continue
2;}if($U=='and')$_b['$and'][]=array($eb=>array($ve=>$X));elseif($U=='or')$_b['$or'][]=array($eb=>array($ve=>$X));}}}return$_b;}$xe=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}elseif(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Sg,$B){return@new
MongoClient($Sg,$B);}function
query($F){return
false;}function
select_db($k){try{$this->_db=$this->_link->selectDB($k);return
true;}catch(Exception$ec){$this->error=$ec->getMessage();return
false;}}function
quote($Q){return$Q;}function
ping($z){}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$wd){$J=array();foreach($wd
as$x=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$x]=63;$J[$x]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$x=>$X)$I[$x]=$J[$x];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$Ad=array_keys($this->_rows[0]);$A=$Ad[$this->_offset++];return(object)array('name'=>$A,'charsetnr'=>$this->_charset[$A],);}}class
Min_Driver
extends
Min_SQL{public$Ue="_id";function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){$L=($L==array("*")?array():array_fill_keys($L,true));$Pf=array();foreach($_e
as$X){$X=preg_replace('~ DESC$~','',$X,1,$ub);$Pf[$X]=($ub?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$L)->sort($Pf)->limit($y!=""?+$y:0)->skip($C*$y));}function
insert($R,$O){try{$I=$this->_conn->_db->selectCollection($R)->insert($O);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$O['_id'];return!$I['err'];}catch(Exception$ec){$this->_conn->error=$ec->getMessage();return
false;}}}function
get_databases($_c){global$h;$I=array();$Bb=$h->_link->listDBs();foreach($Bb['databases']as$m)$I[]=$m['name'];return$I;}function
count_tables($l){global$h;$I=array();foreach($l
as$m)$I[$m]=count($h->_link->selectDB($m)->getCollectionNames(true));return$I;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
drop_databases($l){global$h;foreach($l
as$m){$pf=$h->_link->selectDB($m)->drop();if(!$pf['ok'])return
false;}return
true;}function
indexes($R,$i=null){global$h;$I=array();foreach($h->_db->selectCollection($R)->getIndexInfo()as$u){$Hb=array();foreach($u["key"]as$e=>$U)$Hb[]=($U==-1?'1':null);$I[$u["name"]]=array("type"=>($u["name"]=="_id_"?"PRIMARY":($u["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($u["key"]),"lengths"=>array(),"descs"=>$Hb,);}return$I;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}$xe=array("=");}function
table($t){return$t;}function
idf_escape($t){return$t;}function
table_status($A="",$oc=false){$I=array();foreach(tables_list()as$R=>$U){$I[$R]=array("Name"=>$R);if($A==$R)return$I[$R];}return$I;}function
create_database($m,$d){return
true;}function
last_id(){global$h;return$h->last_id;}function
error(){global$h;return
h($h->error);}function
collations(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
connect(){global$b;$h=new
Min_DB;list($N,$V,$E)=$b->credentials();$B=array();if($V.$E!=""){$B["username"]=$V;$B["password"]=$E;}$m=$b->database();if($m!="")$B["db"]=$m;if(($Fa=getenv("MONGO_AUTH_SOURCE")))$B["authSource"]=$Fa;try{$h->_link=$h->connect("mongodb://$N",$B);if($E!=""){$B["password"]="";try{$h->ping($h->connect("mongodb://$N",$B));return
lang(22);}catch(Exception$ec){}}return$h;}catch(Exception$ec){return$ec->getMessage();}}function
alter_indexes($R,$c){global$h;foreach($c
as$X){list($U,$A,$O)=$X;if($O=="DROP")$I=$h->_db->command(array("deleteIndexes"=>$R,"index"=>$A));else{$f=array();foreach($O
as$e){$e=preg_replace('~ DESC$~','',$e,1,$ub);$f[$e]=($ub?-1:1);}$I=$h->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$A,));}if($I['errmsg']){$h->error=$I['errmsg'];return
false;}}return
true;}function
support($pc){return
preg_match("~database|indexes|descidx~",$pc);}function
db_collation($m,$fb){}function
information_schema(){}function
is_view($S){}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){global$h;if($R==""){$h->_db->createCollection($A);return
true;}}function
drop_tables($T){global$h;foreach($T
as$R){$pf=$h->_db->selectCollection($R)->drop();if(!$pf['ok'])return
false;}return
true;}function
truncate_tables($T){global$h;foreach($T
as$R){$pf=$h->_db->selectCollection($R)->remove();if(!$pf['ok'])return
false;}return
true;}$w="mongo";$Lc=array();$Pc=array();$Rb=array(array("json"));}$Mb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$Se=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url,$_db;function
rootQuery($Le,$sb=array(),$de='GET'){@ini_set('track_errors',1);$sc=@file_get_contents("$this->_url/".ltrim($Le,'/'),false,stream_context_create(array('http'=>array('method'=>$de,'content'=>$sb===null?$sb:json_encode($sb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$sc){$this->error=$php_errormsg;return$sc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=lang(32)." $http_response_header[0]";return
false;}$I=json_decode($sc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$qb=get_defined_constants(true);foreach($qb['json']as$A=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$A)){$this->error=$A;break;}}}}return$I;}function
query($Le,$sb=array(),$de='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Le,'/'),$sb,$de);}function
connect($N,$V,$E){preg_match('~^(https?://)?(.*)~',$N,$_);$this->_url=($_[1]?$_[1]:"http://")."$V:$E@$_[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($K);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){global$b;$_b=array();$F="$R/_search";if($L!=array("*"))$_b["fields"]=$L;if($_e){$Pf=array();foreach($_e
as$eb){$eb=preg_replace('~ DESC$~','',$eb,1,$ub);$Pf[]=($ub?array($eb=>"desc"):$eb);}$_b["sort"]=$Pf;}if($y){$_b["size"]=+$y;if($C)$_b["from"]=($C*$y);}foreach($Z
as$X){list($eb,$ve,$X)=explode(" ",$X,3);if($eb=="_id")$_b["query"]["ids"]["values"][]=$X;elseif($eb.$X!=""){$lg=array("term"=>array(($eb!=""?$eb:"_all")=>$X));if($ve=="=")$_b["query"]["filtered"]["filter"]["and"][]=$lg;else$_b["query"]["filtered"]["query"]["bool"]["must"][]=$lg;}}if($_b["query"]&&!$_b["query"]["filtered"]["query"]&&!$_b["query"]["ids"])$_b["query"]["filtered"]["query"]=array("match_all"=>array());$Wf=microtime(true);$zf=$this->_conn->query($F,$_b);if($We)echo$b->selectQuery("$F: ".json_encode($_b),$Wf,!$zf);if(!$zf)return
false;$I=array();foreach($zf['hits']['hits']as$Yc){$J=array();if($L==array("*"))$J["_id"]=$Yc["_id"];$q=$Yc['_source'];if($L!=array("*")){$q=array();foreach($L
as$x)$q[$x]=$Yc['fields'][$x];}foreach($q
as$x=>$X){if($_b["fields"])$X=$X[0];$J[$x]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($U,$hf,$G,$y=0,$M="\n"){$Ke=preg_split('~ *= *~',$G);if(count($Ke)==2){$s=trim($Ke[1]);$F="$U/$s";return$this->_conn->query($F,$hf,'POST');}return
false;}function
insert($U,$hf){$s="";$F="$U/$s";$pf=$this->_conn->query($F,$hf,'POST');$this->_conn->last_id=$pf['_id'];return$pf['created'];}function
delete($U,$G,$y=0){$dd=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$dd[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Va){$Ke=preg_split('~ *= *~',$Va);if(count($Ke)==2)$dd[]=trim($Ke[1]);}}$this->_conn->affected_rows=0;foreach($dd
as$s){$F="{$U}/{$s}";$pf=$this->_conn->query($F,'{}','DELETE');if(is_array($pf)&&$pf['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$h=new
Min_DB;list($N,$V,$E)=$b->credentials();if($E!=""&&$h->connect($N,$V,""))return
lang(22);if($h->connect($N,$V,$E))return$h;return$h->error;}function
support($pc){return
preg_match("~database|table|columns~",$pc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){global$h;$I=$h->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($m,$fb){}function
engines(){return
array();}function
count_tables($l){global$h;$I=array();$H=$h->query('_stats');if($H&&$H['indices']){$jd=$H['indices'];foreach($jd
as$id=>$Xf){$hd=$Xf['total']['indexing'];$I[$id]=$hd['index_total'];}}return$I;}function
tables_list(){global$h;if(min_version(6))return
array('_doc'=>'table');$I=$h->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$h->_db]["mappings"]),'table');return$I;}function
table_status($A="",$oc=false){global$h;$zf=$h->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($zf){$T=$zf["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$I[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($A!=""&&$A==$R["key"])return$I[$A];}}return$I;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$h;$Qd=array();if(min_version(6)){$H=$h->query("_mapping");if($H)$Qd=$H[$h->_db]['mappings']['properties'];}else{$H=$h->query("$R/_mapping");if($H){$Qd=$H[$R]['properties'];if(!$Qd)$Qd=$H[$h->_db]['mappings'][$R]['properties'];}}$I=array();if($Qd){foreach($Qd
as$A=>$p){$I[$A]=array("field"=>$A,"full_type"=>$p["type"],"type"=>$p["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($p["properties"]){unset($I[$A]["privileges"]["insert"]);unset($I[$A]["privileges"]["update"]);}}}return$I;}function
foreign_keys($R){return
array();}function
table($t){return$t;}function
idf_escape($t){return$t;}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($m){global$h;return$h->rootQuery(urlencode($m),null,'PUT');}function
drop_databases($l){global$h;return$h->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){global$h;$Ze=array();foreach($q
as$mc){$qc=trim($mc[1][0]);$rc=trim($mc[1][1]?$mc[1][1]:"text");$Ze[$qc]=array('type'=>$rc);}if(!empty($Ze))$Ze=array('properties'=>$Ze);return$h->query("_mapping/{$A}",$Ze,'PUT');}function
drop_tables($T){global$h;$I=true;foreach($T
as$R)$I=$I&&$h->query(urlencode($R),array(),'DELETE');return$I;}function
last_id(){global$h;return$h->last_id;}$w="elastic";$xe=array("=","query");$Lc=array();$Pc=array();$Rb=array(array("json"));$Jg=array();$Zf=array();foreach(array(lang(27)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(28)=>array("date"=>10),lang(25)=>array("string"=>65535,"text"=>65535),lang(29)=>array("binary"=>255),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}}$Mb["clickhouse"]="ClickHouse (alpha)";if(isset($_GET["clickhouse"])){define("DRIVER","clickhouse");class
Min_DB{var$extension="JSON",$server_info,$errno,$_result,$error,$_url;var$_db='default';function
rootQuery($m,$F){@ini_set('track_errors',1);$sc=@file_get_contents("$this->_url/?database=$m",false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$this->isQuerySelectLike($F)?"$F FORMAT JSONCompact":$F,'header'=>'Content-type: application/x-www-form-urlencoded','ignore_errors'=>1,))));if($sc===false){$this->error=$php_errormsg;return$sc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=lang(32)." $http_response_header[0]";return
false;}$I=json_decode($sc,true);if($I===null){if(!$this->isQuerySelectLike($F)&&$sc==='')return
true;$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$qb=get_defined_constants(true);foreach($qb['json']as$A=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$A)){$this->error=$A;break;}}}}return
new
Min_Result($I);}function
isQuerySelectLike($F){return(bool)preg_match('~^(select|show)~i',$F);}function
query($F){return$this->rootQuery($this->_db,$F);}function
connect($N,$V,$E){preg_match('~^(https?://)?(.*)~',$N,$_);$this->_url=($_[1]?$_[1]:"http://")."$V:$E@$_[2]";$I=$this->query('SELECT 1');return(bool)$I;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return"'".addcslashes($Q,"\\'")."'";}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=0){$H=$this->query($F);return$H['data'];}}class
Min_Result{var$num_rows,$_rows,$columns,$meta,$_offset=0;function
__construct($H){$this->num_rows=$H['rows'];$this->_rows=$H['data'];$this->meta=$H['meta'];$this->columns=array_column($this->meta,'name');reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J===false?false:array_combine($this->columns,$J);}function
fetch_row(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;if($e<count($this->columns)){$I->name=$this->meta[$e]['name'];$I->orgname=$I->name;$I->type=$this->meta[$e]['type'];}return$I;}}class
Min_Driver
extends
Min_SQL{function
delete($R,$G,$y=0){if($G==='')$G='WHERE 1=1';return
queries("ALTER TABLE ".table($R)." DELETE $G");}function
update($R,$O,$G,$y=0,$M="\n"){$Zg=array();foreach($O
as$x=>$X)$Zg[]="$x = $X";$F=$M.implode(",$M",$Zg);return
queries("ALTER TABLE ".table($R)." UPDATE $F$G");}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
explain($h,$F){return'';}function
found_rows($S,$Z){$K=get_vals("SELECT COUNT(*) FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):""));return
empty($K)?false:$K[0];}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=$_e=array();foreach($q
as$p){if($p[1][2]===" NULL")$p[1][1]=" Nullable({$p[1][1]})";elseif($p[1][2]===' NOT NULL')$p[1][2]='';if($p[1][3])$p[1][3]='';$c[]=($p[1]?($R!=""?($p[0]!=""?"MODIFY COLUMN ":"ADD COLUMN "):" ").implode($p[1]):"DROP COLUMN ".idf_escape($p[0]));$_e[]=$p[1][0];}$c=array_merge($c,$Bc);$P=($Yb?" ENGINE ".$Yb:"");if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)$P$Je".' ORDER BY ('.implode(',',$_e).')');if($R!=$A){$H=queries("RENAME TABLE ".table($R)." TO ".table($A));if($c)$R=$A;else
return$H;}if($P)$c[]=ltrim($P);return($c||$Je?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Je):true);}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($dh){return
drop_tables($dh);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($_c){global$h;$H=get_rows('SHOW DATABASES');$I=array();foreach($H
as$J)$I[]=$J['name'];sort($I);return$I;}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y".($qe?", $qe":""):"");}function
limit1($R,$F,$Z,$M="\n"){return
limit($F,$Z,1,0,$M);}function
db_collation($m,$fb){}function
engines(){return
array('MergeTree');}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){$H=get_rows('SHOW TABLES');$I=array();foreach($H
as$J)$I[$J['name']]='table';ksort($I);return$I;}function
count_tables($l){return
array();}function
table_status($A="",$oc=false){global$h;$I=array();$T=get_rows("SELECT name, engine FROM system.tables WHERE database = ".q($h->_db));foreach($T
as$R){$I[$R['name']]=array('Name'=>$R['name'],'Engine'=>$R['engine'],);if($A===$R['name'])return$I[$R['name']];}return$I;}function
is_view($S){return
false;}function
fk_support($S){return
false;}function
convert_field($p){}function
unconvert_field($p,$I){if(in_array($p['type'],array("Int8","Int16","Int32","Int64","UInt8","UInt16","UInt32","UInt64","Float32","Float64")))return"to$p[type]($I)";return$I;}function
fields($R){$I=array();$H=get_rows("SELECT name, type, default_expression FROM system.columns WHERE ".idf_escape('table')." = ".q($R));foreach($H
as$J){$U=trim($J['type']);$me=strpos($U,'Nullable(')===0;$I[trim($J['name'])]=array("field"=>trim($J['name']),"full_type"=>$U,"type"=>$U,"default"=>trim($J['default_expression']),"null"=>$me,"auto_increment"=>'0',"privileges"=>array("insert"=>1,"select"=>1,"update"=>0),);}return$I;}function
indexes($R,$i=null){return
array();}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($xf){return
true;}function
auto_increment(){return'';}function
last_id(){return
0;}function
support($pc){return
preg_match("~^(columns|sql|status|table|drop_col)$~",$pc);}$w="clickhouse";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("Int8"=>3,"Int16"=>5,"Int32"=>10,"Int64"=>19,"UInt8"=>3,"UInt16"=>5,"UInt32"=>10,"UInt64"=>20,"Float32"=>7,"Float64"=>16,'Decimal'=>38,'Decimal32'=>9,'Decimal64'=>18,'Decimal128'=>38),lang(28)=>array("Date"=>13,"DateTime"=>20),lang(25)=>array("String"=>0),lang(29)=>array("FixedString"=>0),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array();$xe=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Lc=array();$Pc=array("avg","count","count distinct","max","min","sum");$Rb=array();}$Mb=array("server"=>"MySQL")+$Mb;if(!defined("DRIVER")){$Se=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($N="",$V="",$E="",$k=null,$Qe=null,$Of=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Zc,$Qe)=explode(":",$N,2);$Vf=$b->connectSsl();if($Vf)$this->ssl_set($Vf['key'],$Vf['cert'],$Vf['ca'],'','');$I=@$this->real_connect(($N!=""?$Zc:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$E!=""?$E:ini_get("mysqli.default_pw")),$k,(is_numeric($Qe)?$Qe:ini_get("mysqli.default_port")),(!is_numeric($Qe)?$Qe:$Of),($Vf?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$I;}function
set_charset($Ua){if(parent::set_charset($Ua))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Ua");}function
result($F,$p=0){$H=$this->query($F);if(!$H)return
false;$J=$H->fetch_array();return$J[$p];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$E){if(ini_bool("mysql.allow_local_infile")){$this->error=lang(33,"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($N!=""?$N:ini_get("mysql.default_host")),("$N$V"!=""?$V:ini_get("mysql.default_user")),("$N$V$E"!=""?$E:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Ua){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Ua,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Ua");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($k){return
mysql_select_db($k,$this->_link);}function
query($F,$Kg=false){$H=@($Kg?mysql_unbuffered_query($F,$this->_link):mysql_query($F,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=0){$H=$this->query($F);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$p);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($N,$V,$E){global$b;$B=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Vf=$b->connectSsl();if($Vf){if(!empty($Vf['key']))$B[PDO::MYSQL_ATTR_SSL_KEY]=$Vf['key'];if(!empty($Vf['cert']))$B[PDO::MYSQL_ATTR_SSL_CERT]=$Vf['cert'];if(!empty($Vf['ca']))$B[PDO::MYSQL_ATTR_SSL_CA]=$Vf['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$N)),$V,$E,$B);return
true;}function
set_charset($Ua){$this->query("SET NAMES $Ua");}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($F,$Kg=false){$this->pdo->setAttribute(1000,!$Kg);return
parent::query($F,$Kg);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$O){return($O?parent::insert($R,$O):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$K,$Ue){$f=array_keys(reset($K));$Te="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Zg=array();foreach($f
as$x)$Zg[$x]="$x = VALUES($x)";$cg="\nON DUPLICATE KEY UPDATE ".implode(", ",$Zg);$Zg=array();$Jd=0;foreach($K
as$O){$Y="(".implode(", ",$O).")";if($Zg&&(strlen($Te)+$Jd+strlen($Y)+strlen($cg)>1e6)){if(!queries($Te.implode(",\n",$Zg).$cg))return
false;$Zg=array();$Jd=0;}$Zg[]=$Y;$Jd+=strlen($Y)+2;}return
queries($Te.implode(",\n",$Zg).$cg);}function
slowQuery($F,$qg){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$qg FOR $F";elseif(preg_match('~^(SELECT\b)(.+)~is',$F,$_))return"$_[1] /*+ MAX_EXECUTION_TIME(".($qg*1000).") */ $_[2]";}}function
convertSearch($t,$X,$p){return(preg_match('~char|text|enum|set~',$p["type"])&&!preg_match("~^utf8~",$p["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($t USING ".charset($this->_conn).")":$t);}function
warnings(){$H=$this->_conn->query("SHOW WARNINGS");if($H&&$H->num_rows){ob_start();select($H);return
ob_get_clean();}}function
tableHelp($A){$Rd=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Rd?"information-schema-$A-table/":str_replace("_","-",$A)."-table.html"));if(DB=="mysql")return($Rd?"mysql$A-table/":"system-database.html");}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
connect(){global$b,$Jg,$Zf;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$h)){$Zf[lang(25)][]="json";$Jg["json"]=4294967295;}return$h;}$I=$h->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($wf=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$wf;return$I;}function
get_databases($_c){$I=get_session("dbs");if($I===null){$F=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$I=($_c?slow_query($F):get_vals($F));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y".($qe?" OFFSET $qe":""):"");}function
limit1($R,$F,$Z,$M="\n"){return
limit($F,$Z,1,0,$M);}function
db_collation($m,$fb){global$h;$I=null;$vb=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$vb,$_))$I=$_[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$vb,$_))$I=$fb[$_[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$I=array();foreach($l
as$m)$I[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$I;}function
table_status($A="",$oc=false){$I=array();foreach(get_rows($oc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($A!=""?"AND TABLE_NAME = ".q($A):"ORDER BY Name"):"SHOW TABLE STATUS".($A!=""?" LIKE ".q(addcslashes($A,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($A!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$J){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$J["Type"],$_);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$_[1],"length"=>$_[2],"unsigned"=>ltrim($_[3].$_[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$_[1])?(preg_match('~text~',$_[1])?stripslashes(preg_replace("~^'(.*)'\$~",'\1',$J["Default"])):$J["Default"]):null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$_)?$_[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$J["Extra"]),);}return$I;}function
indexes($R,$i=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$i)as$J){$A=$J["Key_name"];$I[$A]["type"]=($A=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$A]["columns"][]=$J["Column_name"];$I[$A]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$A]["descs"][]=null;}return$I;}function
foreign_keys($R){global$h,$se;static$Me='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$I=array();$wb=$h->result("SHOW CREATE TABLE ".table($R),1);if($wb){preg_match_all("~CONSTRAINT ($Me) FOREIGN KEY ?\\(((?:$Me,? ?)+)\\) REFERENCES ($Me)(?:\\.($Me))? \\(((?:$Me,? ?)+)\\)(?: ON DELETE ($se))?(?: ON UPDATE ($se))?~",$wb,$Ud,PREG_SET_ORDER);foreach($Ud
as$_){preg_match_all("~$Me~",$_[2],$Qf);preg_match_all("~$Me~",$_[5],$jg);$I[idf_unescape($_[1])]=array("db"=>idf_unescape($_[4]!=""?$_[3]:$_[4]),"table"=>idf_unescape($_[4]!=""?$_[4]:$_[3]),"source"=>array_map('idf_unescape',$Qf[0]),"target"=>array_map('idf_unescape',$jg[0]),"on_delete"=>($_[6]?$_[6]:"RESTRICT"),"on_update"=>($_[7]?$_[7]:"RESTRICT"),);}}return$I;}function
view($A){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$h->result("SHOW CREATE VIEW ".table($A),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$x=>$X)asort($I[$x]);return$I;}function
information_schema($m){return(min_version(5)&&$m=="information_schema")||(min_version(5.5)&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" COLLATE ".q($d):""));}function
drop_databases($l){$I=apply_queries("DROP DATABASE",$l,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($A,$d){$I=false;if(create_database($A,$d)){$mf=array();foreach(tables_list()as$R=>$U)$mf[]=table($R)." TO ".idf_escape($A).".".table($R);$I=(!$mf||queries("RENAME TABLE ".implode(", ",$mf)));if($I)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$I;}function
auto_increment(){$Ha=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$u){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$u["columns"],true)){$Ha="";break;}if($u["type"]=="PRIMARY")$Ha=" UNIQUE";}}return" AUTO_INCREMENT$Ha";}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=array();foreach($q
as$p)$c[]=($p[1]?($R!=""?($p[0]!=""?"CHANGE ".idf_escape($p[0]):"ADD"):" ")." ".implode($p[1]).($R!=""?$p[2]:""):"DROP ".idf_escape($p[0]));$c=array_merge($c,$Bc);$P=($jb!==null?" COMMENT=".q($jb):"").($Yb?" ENGINE=".q($Yb):"").($d?" COLLATE ".q($d):"").($Ga!=""?" AUTO_INCREMENT=$Ga":"");if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)$P$Je");if($R!=$A)$c[]="RENAME TO ".table($A);if($P)$c[]=ltrim($P);return($c||$Je?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Je):true);}function
alter_indexes($R,$c){foreach($c
as$x=>$X)$c[$x]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($dh){return
queries("DROP VIEW ".implode(", ",array_map('table',$dh)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$dh,$jg){$mf=array();foreach(array_merge($T,$dh)as$R)$mf[]=table($R)." TO ".idf_escape($jg).".".table($R);return
queries("RENAME TABLE ".implode(", ",$mf));}function
copy_tables($T,$dh,$jg){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$A=($jg==DB?table("copy_$R"):idf_escape($jg).".".table($R));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $A"))||!queries("CREATE TABLE $A LIKE ".table($R))||!queries("INSERT INTO $A SELECT * FROM ".table($R)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$J){$Eg=$J["Trigger"];if(!queries("CREATE TRIGGER ".($jg==DB?idf_escape("copy_$Eg"):idf_escape($jg).".".idf_escape($Eg))." $J[Timing] $J[Event] ON $A FOR EACH ROW\n$J[Statement];"))return
false;}}foreach($dh
as$R){$A=($jg==DB?table("copy_$R"):idf_escape($jg).".".table($R));$ch=view($R);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $A"))||!queries("CREATE VIEW $A AS $ch[select]"))return
false;}return
true;}function
trigger($A){if($A=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($A));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($A,$U){global$h,$Zb,$od,$Jg;$xa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Rf="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Ig="((".implode("|",array_merge(array_keys($Jg),$xa)).")\\b(?:\\s*\\(((?:[^'\")]|$Zb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Me="$Rf*(".($U=="FUNCTION"?"":$od).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Ig";$vb=$h->result("SHOW CREATE $U ".idf_escape($A),2);preg_match("~\\(((?:$Me\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Ig\\s+":"")."(.*)~is",$vb,$_);$q=array();preg_match_all("~$Me\\s*,?~is",$_[1],$Ud,PREG_SET_ORDER);foreach($Ud
as$Ge)$q[]=array("field"=>str_replace("``","`",$Ge[2]).$Ge[3],"type"=>strtolower($Ge[5]),"length"=>preg_replace_callback("~$Zb~s",'normalize_enum',$Ge[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Ge[8] $Ge[7]"))),"null"=>1,"full_type"=>$Ge[4],"inout"=>strtoupper($Ge[1]),"collation"=>strtolower($Ge[9]),);if($U!="FUNCTION")return
array("fields"=>$q,"definition"=>$_[11]);return
array("fields"=>$q,"returns"=>array("type"=>$_[12],"length"=>$_[13],"unsigned"=>$_[15],"collation"=>$_[16]),"definition"=>$_[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($A,$J){return
idf_escape($A);}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$F){return$h->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$F);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($xf,$i=null){return
true;}function
create_sql($R,$Ga,$ag){global$h;$I=$h->result("SHOW CREATE TABLE ".table($R),1);if(!$Ga)$I=preg_replace('~ AUTO_INCREMENT=\d+~','',$I);return$I;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($k){return"USE ".idf_escape($k);}function
trigger_sql($R){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($p){if(preg_match("~binary~",$p["type"]))return"HEX(".idf_escape($p["field"]).")";if($p["type"]=="bit")return"BIN(".idf_escape($p["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($p["field"]).")";}function
unconvert_field($p,$I){if(preg_match("~binary~",$p["type"]))$I="UNHEX($I)";if($p["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))$I=(min_version(8)?"ST_":"")."GeomFromText($I, SRID($p[field]))";return$I;}function
support($pc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$pc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$h;return$h->result("SELECT @@max_connections");}$w="sql";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(28)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(25)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(34)=>array("enum"=>65535,"set"=>64),lang(29)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(31)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array("unsigned","zerofill","unsigned zerofill");$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Lc=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$Pc=array("avg","count","count distinct","group_concat","max","min","sum");$Rb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.7.9";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".lang(35)."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($vb=false){return
password_file($vb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($N){}function
database(){global$h;if($h){$l=$this->databases(false);return(!$l?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$l[(information_schema($l[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($_c=true){return
get_databases($_c);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$tc="adminer.css";if(file_exists($tc))$I[]=$tc;return$I;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.lang(36).'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.lang(37).'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".lang(38)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(39))."\n";}function
loginFormField($A,$Wc,$Y){return$Wc.$Y;}function
login($Od,$E){return
true;}function
tableName($fg){return
h($fg["Comment"]!=""?$fg["Comment"]:$fg["Name"]);}function
fieldName($p,$_e=0){return
h(preg_replace('~\s+\[.*\]$~','',($p["comment"]!=""?$p["comment"]:$p["field"])));}function
selectLinks($fg,$O=""){$a=$fg["Name"];if($O!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$O).'">'.lang(40)."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$eg){$I=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$J)$I[$J["TABLE_NAME"]]["keys"][$J["CONSTRAINT_NAME"]][$J["COLUMN_NAME"]]=$J["REFERENCED_COLUMN_NAME"];foreach($I
as$x=>$X){$A=$this->tableName(table_status($x,true));if($A!=""){$zf=preg_quote($eg);$M="(:|\\s*-)?\\s+";$I[$x]["name"]=(preg_match("(^$zf$M(.+)|^(.+?)$M$zf\$)iu",$A,$_)?$_[2].$_[3]:$A);}else
unset($I[$x]);}return$I;}function
backwardKeysPrint($Ka,$J){foreach($Ka
as$R=>$Ja){foreach($Ja["keys"]as$hb){$z=ME.'select='.urlencode($R);$r=0;foreach($hb
as$e=>$X)$z.=where_link($r++,$e,$J[$X]);echo"<a href='".h($z)."'>".h($Ja["name"])."</a>";$z=ME.'edit='.urlencode($R);foreach($hb
as$e=>$X)$z.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($J[$X]);echo"<a href='".h($z)."' title='".lang(40)."'>+</a> ";}}}function
selectQuery($F,$Wf,$nc=false){return"<!--\n".str_replace("--","--><!-- ",$F)."\n(".format_time($Wf).")\n-->\n";}function
rowDescription($R){foreach(fields($R)as$p){if(preg_match("~varchar|character varying~",$p["type"]))return
idf_escape($p["field"]);}return"";}function
rowDescriptions($K,$Dc){$I=$K;foreach($K[0]as$x=>$X){if(list($R,$s,$A)=$this->_foreignColumn($Dc,$x)){$dd=array();foreach($K
as$J)$dd[$J[$x]]=q($J[$x]);$Gb=$this->_values[$R];if(!$Gb)$Gb=get_key_vals("SELECT $s, $A FROM ".table($R)." WHERE $s IN (".implode(", ",$dd).")");foreach($K
as$he=>$J){if(isset($J[$x]))$I[$he][$x]=(string)$Gb[$J[$x]];}}}return$I;}function
selectLink($X,$p){}function
selectVal($X,$z,$p,$Be){$I=$X;$z=h($z);if(preg_match('~blob|bytea~',$p["type"])&&!is_utf8($X)){$I=lang(41,strlen($Be));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$Be))$I="<img src='$z' alt='$I'>";}if(like_bool($p)&&$I!="")$I=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?lang(42):lang(43));if($z)$I="<a href='$z'".(is_url($z)?target_blank():"").">$I</a>";if(!$z&&!like_bool($p)&&preg_match(number_type(),$p["type"]))$I="<div class='number'>$I</div>";elseif(preg_match('~date~',$p["type"]))$I="<div class='datetime'>$I</div>";return$I;}function
editVal($X,$p){if(preg_match('~date|timestamp~',$p["type"])&&$X!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~',lang(44),$X);return$X;}function
selectColumnsPrint($L,$f){}function
selectSearchPrint($Z,$f,$v){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.lang(45)."</legend><div>\n";$Ad=array();foreach($Z
as$x=>$X)$Ad[$X["col"]]=$x;$r=0;$q=fields($_GET["select"]);foreach($f
as$A=>$Fb){$p=$q[$A];if(preg_match("~enum~",$p["type"])||like_bool($p)){$x=$Ad[$A];$r--;echo"<div>".h($Fb)."<input type='hidden' name='where[$r][col]' value='".h($A)."'>:",(like_bool($p)?" <select name='where[$r][val]'>".optionlist(array(""=>"",lang(43),lang(42)),$Z[$x]["val"],true)."</select>":enum_input("checkbox"," name='where[$r][val][]'",$p,(array)$Z[$x]["val"],($p["null"]?0:null))),"</div>\n";unset($f[$A]);}elseif(is_array($B=$this->_foreignKeyOptions($_GET["select"],$A))){if($q[$A]["null"])$B[0]='('.lang(7).')';$x=$Ad[$A];$r--;echo"<div>".h($Fb)."<input type='hidden' name='where[$r][col]' value='".h($A)."'><input type='hidden' name='where[$r][op]' value='='>: <select name='where[$r][val]'>".optionlist($B,$Z[$x]["val"],true)."</select></div>\n";unset($f[$A]);}}$r=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$r][col]'><option value=''>(".lang(46).")".optionlist($f,$X["col"],true)."</select>",html_select("where[$r][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$r][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$r++;}}echo"<div><select name='where[$r][col]'><option value=''>(".lang(46).")".optionlist($f,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$r][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$r][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($_e,$f,$v){$Ae=array();foreach($v
as$x=>$u){$_e=array();foreach($u["columns"]as$X)$_e[]=$f[$X];if(count(array_filter($_e,'strlen'))>1&&$x!="PRIMARY")$Ae[$x]=implode(", ",$_e);}if($Ae){echo'<fieldset><legend>'.lang(47)."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$Ae,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($y){echo"<fieldset><legend>".lang(48)."</legend><div>";echo
html_select("limit",array("","50","100"),$y),"</div></fieldset>\n";}function
selectLengthPrint($ng){}function
selectActionPrint($v){echo"<fieldset><legend>".lang(49)."</legend><div>","<input type='submit' value='".lang(50)."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Vb,$f){if($Vb){print_fieldset("email",lang(51),$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".lang(52).": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",lang(53).": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".lang(11)."'>\n";echo"<p>".lang(54).": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Vb)==1?'<input type="hidden" name="email_field" value="'.h(key($Vb)).'">':html_select("email_field",$Vb)),"<input type='submit' name='email' value='".lang(55)."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$v){return
array(array(),array());}function
selectSearchProcess($q,$v){global$n;$I=array();foreach((array)$_GET["where"]as$x=>$Z){$eb=$Z["col"];$ve=$Z["op"];$X=$Z["val"];if(($x<0?"":$eb).$X!=""){$lb=array();foreach(($eb!=""?array($eb=>$q[$eb]):$q)as$A=>$p){if($eb!=""||is_numeric($X)||!preg_match(number_type(),$p["type"])){$A=idf_escape($A);if($eb!=""&&$p["type"]=="enum")$lb[]=(in_array(0,$X)?"$A IS NULL OR ":"")."$A IN (".implode(", ",array_map('intval',$X)).")";else{$og=preg_match('~char|text|enum|set~',$p["type"]);$Y=$this->processInput($p,(!$ve&&$og&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$lb[]=$n->convertSearch($A,$X,$p).($Y=="NULL"?" IS".($ve==">="?" NOT":"")." $Y":(in_array($ve,$this->operators)||$ve=="="?" $ve $Y":($og?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($x<0&&$X=="0")$lb[]="$A IS NULL";}}}$I[]=($lb?"(".implode(" OR ",$lb).")":"1 = 0");}}return$I;}function
selectOrderProcess($q,$v){$gd=$_GET["index_order"];if($gd!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($gd!=""?array($v[$gd]):$v)as$u){if($gd!=""||$u["type"]=="INDEX"){$Rc=array_filter($u["descs"]);$Fb=false;foreach($u["columns"]as$X){if(preg_match('~date|timestamp~',$q[$X]["type"])){$Fb=true;break;}}$I=array();foreach($u["columns"]as$x=>$X)$I[]=idf_escape($X).(($Rc?$u["descs"][$x]:$Fb)?" DESC":"");return$I;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$Dc){if($_POST["email_append"])return
true;if($_POST["email"]){$Df=0;if($_POST["all"]||$_POST["check"]){$p=idf_escape($_POST["email_field"]);$bg=$_POST["email_subject"];$ae=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$bg.$ae",$Ud);$K=get_rows("SELECT DISTINCT $p".($Ud[1]?", ".implode(", ",array_map('idf_escape',array_unique($Ud[1]))):"")." FROM ".table($_GET["select"])." WHERE $p IS NOT NULL AND $p != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$q=fields($_GET["select"]);foreach($this->rowDescriptions($K,$Dc)as$J){$nf=array('{\\'=>'{');foreach($Ud[1]as$X)$nf['{$'."$X}"]=$this->editVal($J[$X],$q[$X]);$Ub=$J[$_POST["email_field"]];if(is_mail($Ub)&&send_mail($Ub,strtr($bg,$nf),strtr($ae,$nf),$_POST["email_from"],$_FILES["email_files"]))$Df++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(56,$Df));}return
false;}function
selectQueryBuild($L,$Z,$Mc,$_e,$y,$C){return"";}function
messageQuery($F,$pg,$nc=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$F)."\n".($pg?"($pg)\n":"")."-->";}function
editFunctions($p){$I=array();if($p["null"]&&preg_match('~blob~',$p["type"]))$I["NULL"]=lang(7);$I[""]=($p["null"]||$p["auto_increment"]||like_bool($p)?"":"*");if(preg_match('~date|time~',$p["type"]))$I["now"]=lang(57);if(preg_match('~_(md5|sha1)$~i',$p["field"],$_))$I[]=strtolower($_[1]);return$I;}function
editInput($R,$p,$Da,$Y){if($p["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Da value='-1' checked><i>".lang(8)."</i></label> ":"").enum_input("radio",$Da,$p,($Y||isset($_GET["select"])?$Y:0),($p["null"]?"":null));$B=$this->_foreignKeyOptions($R,$p["field"],$Y);if($B!==null)return(is_array($B)?"<select$Da>".optionlist($B,$Y,true)."</select>":"<input value='".h($Y)."'$Da class='hidden'>"."<input value='".h($B)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($R)."&field=".urlencode($p["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($p))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?' checked':'')."$Da>";$Xc="";if(preg_match('~time~',$p["type"]))$Xc=lang(58);if(preg_match('~date|timestamp~',$p["type"]))$Xc=lang(59).($Xc?" [$Xc]":"");if($Xc)return"<input value='".h($Y)."'$Da> ($Xc)";if(preg_match('~_(md5|sha1)$~i',$p["field"]))return"<input type='password' value='".h($Y)."'$Da>";return'';}function
editHint($R,$p,$Y){return(preg_match('~\s+(\[.*\])$~',($p["comment"]!=""?$p["comment"]:$p["field"]),$_)?h(" $_[1]"):'');}function
processInput($p,$Y,$Kc=""){if($Kc=="now")return"$Kc()";$I=$Y;if(preg_match('~date|timestamp~',$p["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote(lang(44)))).'(.*))',$Y,$_))$I=($_["p1"]!=""?$_["p1"]:($_["p2"]!=""?($_["p2"]<70?20:19).$_["p2"]:gmdate("Y")))."-$_[p3]$_[p4]-$_[p5]$_[p6]".end($_);$I=($p["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$I:q($I));if($Y==""&&like_bool($p))$I="'0'";elseif($Y==""&&($p["null"]||!preg_match('~char|text~',$p["type"])))$I="NULL";elseif(preg_match('~^(md5|sha1)$~',$Kc))$I="$Kc($I)";return
unconvert_field($p,$I);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable($R,$ag,$vd=0){echo"\xef\xbb\xbf";}function
dumpData($R,$ag,$F){global$h;$H=$h->query($F,1);if($H){while($J=$H->fetch_assoc()){if($ag=="table"){dump_csv(array_keys($J));$ag="INSERT";}dump_csv($J);}}}function
dumpFilename($bd){return
friendly_url($bd);}function
dumpHeaders($bd,$fe=false){$jc="csv";header("Content-Type: text/csv; charset=utf-8");return$jc;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($ee){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($ee=="auth"){$wc=true;foreach((array)$_SESSION["pwds"]as$ah=>$If){foreach($If[""]as$V=>$E){if($E!==null){if($wc){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$wc=false;}echo"<li><a href='".h(auth_url($ah,"",$V))."'>".($V!=""?h($V):"<i>".lang(7)."</i>")."</a>\n";}}}}else{$this->databasesPrint($ee);if($ee!="db"&&$ee!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($ee){}function
tablesPrint($T){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$J){echo'<li>';$A=$this->tableName($J);if(isset($J["Engine"])&&$A!="")echo"<a href='".h(ME).'select='.urlencode($J["Name"])."'".bold($_GET["select"]==$J["Name"]||$_GET["edit"]==$J["Name"],"select")." title='".lang(60)."'>$A</a>\n";}echo"</ul>\n";}function
_foreignColumn($Dc,$e){foreach((array)$Dc[$e]as$Cc){if(count($Cc["source"])==1){$A=$this->rowDescription($Cc["table"]);if($A!=""){$s=idf_escape($Cc["target"][0]);return
array($Cc["table"],$s,$A);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$h;if(list($jg,$s,$A)=$this->_foreignColumn(column_foreign_keys($R),$e)){$I=&$this->_values[$jg];if($I===null){$S=table_status($jg);$I=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $s, $A FROM ".table($jg)." ORDER BY 2"));}if(!$I&&$Y!==null)return$h->result("SELECT $A FROM ".table($jg)." WHERE $s = ".q($Y));return$I;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($sg,$o="",$Sa=array(),$tg=""){global$ba,$ca,$b,$Mb,$w;page_headers();if(is_ajax()&&$o){page_messages($o);exit;}$ug=$sg.($tg!=""?": $tg":"");$vg=strip_tags($ug.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ba,'" dir="',lang(61),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$vg,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.7.9"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.7.9");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.9"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.9"),'">
';foreach($b->css()as$yb){echo'<link rel="stylesheet" type="text/css" href="',h($yb),'">
';}}echo'
<body class="',lang(61),' nojs">
';$tc=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($tc)&&filemtime($tc)+86400>time()){$bh=unserialize(file_get_contents($tc));$af="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($bh["version"],base64_decode($bh["signature"]),$af)==1)$_COOKIE["adminer_version"]=$bh["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(62)),'\';
var thousandsSeparator = \'',js_escape(lang(5)),'\';
</script>

<div id="help" class="jush-',$w,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Sa!==null){$z=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($z?$z:".").'">'.$Mb[DRIVER].'</a> &raquo; ';$z=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$N=$b->serverName(SERVER);$N=($N!=""?$N:lang(63));if($Sa===false)echo"$N\n";else{echo"<a href='".h($z)."' accesskey='1' title='Alt+Shift+1'>$N</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Sa)))echo'<a href="'.h($z."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Sa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Sa
as$x=>$X){$Fb=(is_array($X)?$X[1]:h($X));if($Fb!="")echo"<a href='".h(ME."$x=").urlencode(is_array($X)?$X[0]:$X)."'>$Fb</a> &raquo; ";}}echo"$sg\n";}}echo"<h2>$ug</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($o);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$xb){$Uc=array();foreach($xb
as$x=>$X)$Uc[]="$x $X";header("Content-Security-Policy: ".implode("; ",$Uc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$le;if(!$le)$le=base64_encode(rand_string());return$le;}function
page_messages($o){$Sg=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$be=$_SESSION["messages"][$Sg];if($be){echo"<div class='message'>".implode("</div>\n<div class='message'>",$be)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Sg]);}if($o)echo"<div class='error'>$o</div>\n";}function
page_footer($ee=""){global$b,$yg;echo'</div>

';switch_lang();if($ee!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(64),'" id="logout">
<input type="hidden" name="token" value="',$yg,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($ee);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($he){while($he>=2147483648)$he-=4294967296;while($he<=-2147483649)$he+=4294967296;return(int)$he;}function
long2str($W,$fh){$wf='';foreach($W
as$X)$wf.=pack('V',$X);if($fh)return
substr($wf,0,end($W));return$wf;}function
str2long($wf,$fh){$W=array_values(unpack('V*',str_pad($wf,4*ceil(strlen($wf)/4),"\0")));if($fh)$W[]=strlen($wf);return$W;}function
xxtea_mx($qh,$ph,$dg,$xd){return
int32((($qh>>5&0x7FFFFFF)^$ph<<2)+(($ph>>3&0x1FFFFFFF)^$qh<<4))^int32(($dg^$ph)+($xd^$qh));}function
encrypt_string($Yf,$x){if($Yf=="")return"";$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Yf,true);$he=count($W)-1;$qh=$W[$he];$ph=$W[0];$bf=floor(6+52/($he+1));$dg=0;while($bf-->0){$dg=int32($dg+0x9E3779B9);$Qb=$dg>>2&3;for($Ee=0;$Ee<$he;$Ee++){$ph=$W[$Ee+1];$ge=xxtea_mx($qh,$ph,$dg,$x[$Ee&3^$Qb]);$qh=int32($W[$Ee]+$ge);$W[$Ee]=$qh;}$ph=$W[0];$ge=xxtea_mx($qh,$ph,$dg,$x[$Ee&3^$Qb]);$qh=int32($W[$he]+$ge);$W[$he]=$qh;}return
long2str($W,false);}function
decrypt_string($Yf,$x){if($Yf=="")return"";if(!$x)return
false;$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Yf,false);$he=count($W)-1;$qh=$W[$he];$ph=$W[0];$bf=floor(6+52/($he+1));$dg=int32($bf*0x9E3779B9);while($dg){$Qb=$dg>>2&3;for($Ee=$he;$Ee>0;$Ee--){$qh=$W[$Ee-1];$ge=xxtea_mx($qh,$ph,$dg,$x[$Ee&3^$Qb]);$ph=int32($W[$Ee]-$ge);$W[$Ee]=$ph;}$qh=$W[$he];$ge=xxtea_mx($qh,$ph,$dg,$x[$Ee&3^$Qb]);$ph=int32($W[0]-$ge);$W[0]=$ph;$dg=int32($dg-0x9E3779B9);}return
long2str($W,true);}$h='';$Tc=$_SESSION["token"];if(!$Tc)$_SESSION["token"]=rand(1,1e6);$yg=get_token();$Oe=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($x)=explode(":",$X);$Oe[$x]=$X;}}function
add_invalid_login(){global$b;$Ic=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$Ic)return;$sd=unserialize(stream_get_contents($Ic));$pg=time();if($sd){foreach($sd
as$td=>$X){if($X[0]<$pg)unset($sd[$td]);}}$rd=&$sd[$b->bruteForceKey()];if(!$rd)$rd=array($pg+30*60,0);$rd[1]++;file_write_unlock($Ic,serialize($sd));}function
check_invalid_login(){global$b;$sd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$rd=$sd[$b->bruteForceKey()];$ke=($rd[1]>29?$rd[0]-time():0);if($ke>0)auth_error(lang(65,ceil($ke/60)));}$Ea=$_POST["auth"];if($Ea){session_regenerate_id();$ah=$Ea["driver"];$N=$Ea["server"];$V=$Ea["username"];$E=(string)$Ea["password"];$m=$Ea["db"];set_password($ah,$N,$V,$E);$_SESSION["db"][$ah][$N][$V][$m]=true;if($Ea["permanent"]){$x=base64_encode($ah)."-".base64_encode($N)."-".base64_encode($V)."-".base64_encode($m);$Xe=$b->permanentLogin(true);$Oe[$x]="$x:".base64_encode($Xe?encrypt_string($E,$Xe):"");cookie("adminer_permanent",implode(" ",$Oe));}if(count($_POST)==1||DRIVER!=$ah||SERVER!=$N||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($ah,$N,$V,$m));}elseif($_POST["logout"]&&(!$Tc||verify_token())){foreach(array("pwds","db","dbs","queries")as$x)set_session($x,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(66).' '.lang(67));}elseif($Oe&&!$_SESSION["pwds"]){session_regenerate_id();$Xe=$b->permanentLogin();foreach($Oe
as$x=>$X){list(,$ab)=explode(":",$X);list($ah,$N,$V,$m)=array_map('base64_decode',explode("-",$x));set_password($ah,$N,$V,decrypt_string(base64_decode($ab),$Xe));$_SESSION["db"][$ah][$N][$V][$m]=true;}}function
unset_permanent(){global$Oe;foreach($Oe
as$x=>$X){list($ah,$N,$V,$m)=array_map('base64_decode',explode("-",$x));if($ah==DRIVER&&$N==SERVER&&$V==$_GET["username"]&&$m==DB)unset($Oe[$x]);}cookie("adminer_permanent",implode(" ",$Oe));}function
auth_error($o){global$b,$Tc;$Jf=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Jf]||$_GET[$Jf])&&!$Tc)$o=lang(68);else{restart_session();add_invalid_login();$E=get_password();if($E!==null){if($E===false)$o.='<br>'.lang(69,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Jf]&&$_GET[$Jf]&&ini_bool("session.use_only_cookies"))$o=lang(70);$D=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$D["lifetime"]);page_header(lang(38),$o,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".lang(71)."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(72),lang(73,implode(", ",$Se)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Zc,$Qe)=explode(":",SERVER,2);if(preg_match('~^\s*([-+]?\d+)~',$Qe,$_)&&($_[1]<1024||$_[1]>65535))auth_error(lang(74));check_invalid_login();$h=connect();$n=new
Min_Driver($h);}$Od=null;if(!is_object($h)||($Od=$b->login($_GET["username"],get_password()))!==true){$o=(is_string($h)?h($h):(is_string($Od)?$Od:lang(32)));auth_error($o.(preg_match('~^ | $~',get_password())?'<br>'.lang(75):''));}if($_POST["logout"]&&$Tc&&!verify_token()){page_header(lang(64),lang(76));page_footer("db");exit;}if($Ea&&$_POST["token"])$_POST["token"]=$yg;$o='';if($_POST){if(!verify_token()){$nd="max_input_vars";$Yd=ini_get($nd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$x){$X=ini_get($x);if($X&&(!$Yd||$X<$Yd)){$nd=$x;$Yd=$X;}}}$o=(!$_POST["token"]&&$Yd?lang(77,"'$nd'"):lang(76).' '.lang(78));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$o=lang(79,"'post_max_size'");if(isset($_GET["sql"]))$o.=' '.lang(80);}function
email_header($Uc){return"=?UTF-8?B?".base64_encode($Uc)."?=";}function
send_mail($Ub,$bg,$ae,$Jc="",$uc=array()){$ac=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$ae=str_replace("\n",$ac,wordwrap(str_replace("\r","","$ae\n")));$Ra=uniqid("boundary");$Ba="";foreach((array)$uc["error"]as$x=>$X){if(!$X)$Ba.="--$Ra$ac"."Content-Type: ".str_replace("\n","",$uc["type"][$x]).$ac."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$uc["name"][$x])."\"$ac"."Content-Transfer-Encoding: base64$ac$ac".chunk_split(base64_encode(file_get_contents($uc["tmp_name"][$x])),76,$ac).$ac;}$Ma="";$Vc="Content-Type: text/plain; charset=utf-8$ac"."Content-Transfer-Encoding: 8bit";if($Ba){$Ba.="--$Ra--$ac";$Ma="--$Ra$ac$Vc$ac$ac";$Vc="Content-Type: multipart/mixed; boundary=\"$Ra\"";}$Vc.=$ac."MIME-Version: 1.0$ac"."X-Mailer: Adminer Editor".($Jc?$ac."From: ".str_replace("\n","",$Jc):"");return
mail($Ub,email_header($bg),$Ma.$ae.$Ba,$Vc);}function
like_bool($p){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$p["full_type"]);}$h->select_db($b->database());$se="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Mb[DRIVER]=lang(38);if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$q=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$n->select($a,$L,array(where($_GET,$q)),$L);$J=($H?$H->fetch_row():array());echo$n->value($J[0],$q[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$q=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$q):""):where($_GET,$q));$Rg=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($q
as$A=>$p){if(!isset($p["privileges"][$Rg?"update":"insert"])||$b->fieldName($p)==""||$p["generated"])unset($q[$A]);}if($_POST&&!$o&&!isset($_GET["select"])){$Nd=$_POST["referer"];if($_POST["insert"])$Nd=($Rg?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Nd))$Nd=ME."select=".urlencode($a);$v=indexes($a);$Mg=unique_array($_GET["where"],$v);$df="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Nd,lang(81),$n->delete($a,$df,!$Mg));else{$O=array();foreach($q
as$A=>$p){$X=process_input($p);if($X!==false&&$X!==null)$O[idf_escape($A)]=$X;}if($Rg){if(!$O)redirect($Nd);queries_redirect($Nd,lang(82),$n->update($a,$O,$df,!$Mg));if(is_ajax()){page_headers();page_messages($o);exit;}}else{$H=$n->insert($a,$O);$Hd=($H?last_id():0);queries_redirect($Nd,lang(83,($Hd?" $Hd":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($q
as$A=>$p){if(isset($p["privileges"]["select"])){$_a=convert_field($p);if($_POST["clone"]&&$p["auto_increment"])$_a="''";if($w=="sql"&&preg_match("~enum|set~",$p["type"]))$_a="1*".idf_escape($A);$L[]=($_a?"$_a AS ":"").idf_escape($A);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$n->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$o=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$q){if(!$Z){$H=$n->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($n->primary=>"");}if($J){foreach($J
as$x=>$X){if(!$Z)$J[$x]=null;$q[$x]=array("field"=>$x,"null"=>($x!=$n->primary),"auto_increment"=>($x==$n->primary));}}}edit_form($a,$q,$J,$Rg);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$v=indexes($a);$q=fields($a);$Fc=column_foreign_keys($a);$re=$S["Oid"];parse_str($_COOKIE["adminer_import"],$ta);$uf=array();$f=array();$ng=null;foreach($q
as$x=>$p){$A=$b->fieldName($p);if(isset($p["privileges"]["select"])&&$A!=""){$f[$x]=html_entity_decode(strip_tags($A),ENT_QUOTES);if(is_shortable($p))$ng=$b->selectLengthProcess();}$uf+=$p["privileges"];}list($L,$Mc)=$b->selectColumnsProcess($f,$v);$ud=count($Mc)<count($L);$Z=$b->selectSearchProcess($q,$v);$_e=$b->selectOrderProcess($q,$v);$y=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Ng=>$J){$_a=convert_field($q[key($J)]);$L=array($_a?$_a:idf_escape(key($J)));$Z[]=where_check($Ng,$q);$I=$n->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}$Ue=$Pg=null;foreach($v
as$u){if($u["type"]=="PRIMARY"){$Ue=array_flip($u["columns"]);$Pg=($L?$Ue:array());foreach($Pg
as$x=>$X){if(in_array(idf_escape($x),$L))unset($Pg[$x]);}break;}}if($re&&!$Ue){$Ue=$Pg=array($re=>0);$v[]=array("type"=>"PRIMARY","columns"=>array($re));}if($_POST&&!$o){$kh=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Ya=array();foreach($_POST["check"]as$Va)$Ya[]=where_check($Va,$q);$kh[]="((".implode(") OR (",$Ya)."))";}$kh=($kh?"\nWHERE ".implode(" AND ",$kh):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Jc=($L?implode(", ",$L):"*").convert_fields($f,$q,$L)."\nFROM ".table($a);$Oc=($Mc&&$ud?"\nGROUP BY ".implode(", ",$Mc):"").($_e?"\nORDER BY ".implode(", ",$_e):"");if(!is_array($_POST["check"])||$Ue)$F="SELECT $Jc$kh$Oc";else{$Lg=array();foreach($_POST["check"]as$X)$Lg[]="(SELECT".limit($Jc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q).$Oc,1).")";$F=implode(" UNION ALL ",$Lg);}$b->dumpData($a,"table",$F);exit;}if(!$b->selectEmailProcess($Z,$Fc)){if($_POST["save"]||$_POST["delete"]){$H=true;$ua=0;$O=array();if(!$_POST["delete"]){foreach($f
as$A=>$X){$X=process_input($q[$A]);if($X!==null&&($_POST["clone"]||$X!==false))$O[idf_escape($A)]=($X!==false?$X:idf_escape($A));}}if($_POST["delete"]||$O){if($_POST["clone"])$F="INTO ".table($a)." (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a);if($_POST["all"]||($Ue&&is_array($_POST["check"]))||$ud){$H=($_POST["delete"]?$n->delete($a,$kh):($_POST["clone"]?queries("INSERT $F$kh"):$n->update($a,$O,$kh)));$ua=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$gh="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q);$H=($_POST["delete"]?$n->delete($a,$gh,1):($_POST["clone"]?queries("INSERT".limit1($a,$F,$gh)):$n->update($a,$O,$gh,1)));if(!$H)break;$ua+=$h->affected_rows;}}}$ae=lang(84,$ua);if($_POST["clone"]&&$H&&$ua==1){$Hd=last_id();if($Hd)$ae=lang(83," $Hd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$ae,$H);if(!$_POST["delete"]){edit_form($a,$q,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$o=lang(85);else{$H=true;$ua=0;foreach($_POST["val"]as$Ng=>$J){$O=array();foreach($J
as$x=>$X){$x=bracket_escape($x,1);$O[idf_escape($x)]=(preg_match('~char|text~',$q[$x]["type"])||$X!=""?$b->processInput($q[$x],$X):"NULL");}$H=$n->update($a,$O," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Ng,$q),!$ud&&!$Ue," ");if(!$H)break;$ua+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(84,$ua),$H);}}elseif(!is_string($sc=get_file("csv_file",true)))$o=upload_error($sc);elseif(!preg_match('~~u',$sc))$o=lang(86);else{cookie("adminer_import","output=".urlencode($ta["output"])."&format=".urlencode($_POST["separator"]));$H=true;$hb=array_keys($q);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$sc,$Ud);$ua=count($Ud[0]);$n->begin();$M=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($Ud[0]as$x=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$M]*)$M~",$X.$M,$Vd);if(!$x&&!array_diff($Vd[1],$hb)){$hb=$Vd[1];$ua--;}else{$O=array();foreach($Vd[1]as$r=>$eb)$O[idf_escape($hb[$r])]=($eb==""&&$q[$hb[$r]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$eb))));$K[]=$O;}}$H=(!$K||$n->insertUpdate($a,$K,$Ue));if($H)$H=$n->commit();queries_redirect(remove_from_uri("page"),lang(87,$ua),$H);$n->rollback();}}}$gg=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(50).": $gg",$o);$O=null;if(isset($uf["insert"])||!support("table")){$O="";foreach((array)$_GET["where"]as$X){if($Fc[$X["col"]]&&count($Fc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$O);if(!$f&&support("table"))echo"<p class='error'>".lang(88).($q?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$f);$b->selectSearchPrint($Z,$f,$v);$b->selectOrderPrint($_e,$f,$v);$b->selectLimitPrint($y);$b->selectLengthPrint($ng);$b->selectActionPrint($v);echo"</form>\n";$C=$_GET["page"];if($C=="last"){$Hc=$h->result(count_rows($a,$Z,$ud,$Mc));$C=floor(max(0,$Hc-1)/$y);}$Af=$L;$Nc=$Mc;if(!$Af){$Af[]="*";$tb=convert_fields($f,$q,$L);if($tb)$Af[]=substr($tb,2);}foreach($L
as$x=>$X){$p=$q[idf_unescape($X)];if($p&&($_a=convert_field($p)))$Af[$x]="$_a AS $X";}if(!$ud&&$Pg){foreach($Pg
as$x=>$X){$Af[]=idf_escape($x);if($Nc)$Nc[]=idf_escape($x);}}$H=$n->select($a,$Af,$Z,$Nc,$_e,$y,$C,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($w=="mssql"&&$C)$H->seek($y*$C);$Wb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($C&&$w=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$y!=""&&$Mc&&$ud&&$w=="sql")$Hc=$h->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".lang(12)."\n";else{$La=$b->backwardKeys($a,$gg);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Mc&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(89)."</a>");$ie=array();$Lc=array();reset($L);$ff=1;foreach($K[0]as$x=>$X){if(!isset($Pg[$x])){$X=$_GET["columns"][key($L)];$p=$q[$L?($X?$X["col"]:current($L)):$x];$A=($p?$b->fieldName($p,$ff):($X["fun"]?"*":$x));if($A!=""){$ff++;$ie[$x]=$A;$e=idf_escape($x);$ad=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x);$Fb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($ad.($_e[0]==$e||$_e[0]==$x||(!$_e&&$ud&&$Mc[0]==$e)?$Fb:'')).'">';echo
apply_sql_function($X["fun"],$A)."</a>";echo"<span class='column hidden'>","<a href='".h($ad.$Fb)."' title='".lang(90)."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(45).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($x)."');");}echo"</span>";}$Lc[$x]=$X["fun"];next($L);}}$Kd=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$x=>$X)$Kd[$x]=max($Kd[$x],min(40,strlen(utf8_decode($X))));}}echo($La?"<th>".lang(91):"")."</thead>\n";if(is_ajax()){if($y%2==1&&$C%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$Fc)as$he=>$J){$Mg=unique_array($K[$he],$v);if(!$Mg){$Mg=array();foreach($K[$he]as$x=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$x))$Mg[$x]=$X;}}$Ng="";foreach($Mg
as$x=>$X){if(($w=="sql"||$w=="pgsql")&&preg_match('~char|text|enum|set~',$q[$x]["type"])&&strlen($X)>64){$x=(strpos($x,'(')?$x:idf_escape($x));$x="MD5(".($w!='sql'||preg_match("~^utf8~",$q[$x]["collation"])?$x:"CONVERT($x USING ".charset($h).")").")";$X=md5($X);}$Ng.="&".($X!==null?urlencode("where[".bracket_escape($x)."]")."=".urlencode($X):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$Mc&&$L?"":"<td>".checkbox("check[]",substr($Ng,1),in_array(substr($Ng,1),(array)$_POST["check"])).($ud||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Ng)."' class='edit'>".lang(92)."</a>"));foreach($J
as$x=>$X){if(isset($ie[$x])){$p=$q[$x];$X=$n->value($X,$p);if($X!=""&&(!isset($Wb[$x])||$Wb[$x]!=""))$Wb[$x]=(is_mail($X)?$ie[$x]:"");$z="";if(preg_match('~blob|bytea|raw|file~',$p["type"])&&$X!="")$z=ME.'download='.urlencode($a).'&field='.urlencode($x).$Ng;if(!$z&&$X!==null){foreach((array)$Fc[$x]as$Ec){if(count($Fc[$x])==1||end($Ec["source"])==$x){$z="";foreach($Ec["source"]as$r=>$Qf)$z.=where_link($r,$Ec["target"][$r],$K[$he][$Qf]);$z=($Ec["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($Ec["db"]),ME):ME).'select='.urlencode($Ec["table"]).$z;if($Ec["ns"])$z=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($Ec["ns"]),$z);if(count($Ec["source"])==1)break;}}}if($x=="COUNT(*)"){$z=ME."select=".urlencode($a);$r=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Mg))$z.=where_link($r++,$W["col"],$W["val"],$W["op"]);}foreach($Mg
as$xd=>$W)$z.=where_link($r++,$xd,$W);}$X=select_value($X,$z,$p,$ng);$s=h("val[$Ng][".bracket_escape($x)."]");$Y=$_POST["val"][$Ng][bracket_escape($x)];$Sb=!is_array($J[$x])&&is_utf8($X)&&$K[$he][$x]==$J[$x]&&!$Lc[$x];$mg=preg_match('~text|lob~',$p["type"]);echo"<td id='$s'";if(($_GET["modify"]&&$Sb)||$Y!==null){$Qc=h($Y!==null?$Y:$J[$x]);echo">".($mg?"<textarea name='$s' cols='30' rows='".(substr_count($J[$x],"\n")+1)."'>$Qc</textarea>":"<input name='$s' value='$Qc' size='$Kd[$x]'>");}else{$Pd=strpos($X,"<i>…</i>");echo" data-text='".($Pd?2:($mg?1:0))."'".($Sb?"":" data-warning='".h(lang(93))."'").">$X</td>";}}}if($La)echo"<td>";$b->backwardKeysPrint($La,$K[$he]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($K||$C){$fc=true;if($_GET["page"]!="last"){if($y==""||(count($K)<$y&&($K||!$C)))$Hc=($C?$C*$y:0)+count($K);elseif($w!="sql"||!$ud){$Hc=($ud?false:found_rows($S,$Z));if($Hc<max(1e4,2*($C+1)*$y))$Hc=reset(slow_query(count_rows($a,$Z,$ud,$Mc)));else$fc=false;}}$Fe=($y!=""&&($Hc===false||$Hc>$y||$C));if($Fe){echo(($Hc===false?count($K)+1:$Hc-$C*$y)>$y?'<p><a href="'.h(remove_from_uri("page")."&page=".($C+1)).'" class="loadmore">'.lang(94).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$y).", '".lang(95)."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($K||$C){if($Fe){$Wd=($Hc===false?$C+(count($K)>=$y?2:1):floor(($Hc-1)/$y));echo"<fieldset>";if($w!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(96)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(96)."', '".($C+1)."')); return false; };"),pagination(0,$C).($C>5?" …":"");for($r=max(1,$C-4);$r<min($Wd,$C+5);$r++)echo
pagination($r,$C);if($Wd>0){echo($C+5<$Wd?" …":""),($fc&&$Hc!==false?pagination($Wd,$C):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Wd'>".lang(97)."</a>");}}else{echo"<legend>".lang(96)."</legend>",pagination(0,$C).($C>1?" …":""),($C?pagination($C,$C):""),($Wd>$C?pagination($C+1,$C).($Wd>$C+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(98)."</legend>";$Kb=($fc?"":"~ ").$Hc;echo
checkbox("all",1,0,($Hc!==false?($fc?"":"~ ").lang(99,$Hc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Kb' : checked); selectCount('selected2', this.checked || !checked ? '$Kb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(89),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(85).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(100),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(101),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$Gc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Gc['sql']);break;}}if($Gc){print_fieldset("export",lang(102)." <span id='selected2'></span>");$De=$b->dumpOutput();echo($De?html_select("output",$De,$ta["output"])." ":""),html_select("format",$Gc,$ta["format"])," <input type='submit' name='export' value='".lang(102)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Wb,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(103)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ta["format"],1);echo" <input type='submit' name='import' value='".lang(103)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$yg'>\n","</form>\n",(!$Mc&&$L?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($R,$s,$A)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$y=11;$H=$h->query("SELECT $s, $A FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$s = $_GET[value] OR ":"")."$A LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $y");for($r=1;($J=$H->fetch_row())&&$r<$y;$r++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($s))."]")."=".urlencode($J[0]))."'>".h($J[1])."</a><br>\n";if($J)echo"...\n";}exit;}else{page_header(lang(63),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(104).": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(45)."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.lang(105),'<td>'.lang(106),"</thead>\n";foreach(table_status()as$R=>$J){$A=$b->tableName($J);if(isset($J["Engine"])&&$A!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($R)."'>$A</a>";$X=format_number($J["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($J["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();