<?php
session_start();
function imageCreateFromAny($filepath) {
	$type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
	$allowedTypes = array(
		1,  // [] gif
		2,  // [] jpg
		3,  // [] png
	);
	if (!in_array($type, $allowedTypes)) {
		return false;
	}
	switch ($type) {
		case 1 :
			$im = imagecreatefromgif($filepath);
		break;
		case 2 :
			$im = imagecreatefromjpeg($filepath);
		break;
		case 3 :
			$im = imagecreatefrompng($filepath);
		break;
	}
	return $im;
}
function is_image( $filename ) {
				if (!file_exists($filename)) {
					return false;
				}
				switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
					case 'jpeg':
					case 'jpg':
						return true;
					break;

					case 'png':
						return true;
					break;

					case 'gif':
						return true;
					break;

					default:
						return false;
					break;
				}
			}

function my_mysql_escape_string($string){
    if (strpos($string, '"') !== false) {
        exit("sql injection prevent");
    }
	return($string);
}

function vytahni_z_databaze (&$sql, &$conn){
	mysqli_select_db("registrace2", $conn);
	$navrat=mysqli_query($conn, $sql);
	$navrat=mysqli_fetch_array($navrat);
	return($navrat);
} //fce vytahni_z_databaze($sql, $conn)
?>

<?php
if(isset($_SESSION["lang"])){
	if(isset($_REQUEST["cze"])){
		$_SESSION["lang"]=0; //cesky
	}
	if(isset($_REQUEST["eng"])){
		$_SESSION["lang"]=1; //anglicky
	}
}else{
	$_SESSION["lang"]=0; //defaultni jazyk
}
if($_SESSION["lang"]==0){
	$uvodchybovezpravy="<div class=\"error_messege alert\"><span class=\"alert_name\">chyba: </span>";
	$neprihlasen_lang="Nepřihlášen";
	$odhlasit_lang="Odhlásit";
	$zpet_lang="Zpět";
	$vitejte_lang="Vítejte,";
	$jmeno_slozky_lang="Jméno složky";
	$vytvorit_novou_slozku_lang="Vytvořit novou složku";
	$nahrat_lang="Nahrát";
	$jmeno_obsahuje_nepovolene_znaky_lang="Jméno složky obsahuje nepovolené znaky.";
	$toto_jmeno_je_jiz_pouzivano_lang="Toto jméno složky je již používáno.";
	$registrace_noveho_uzivatele_lang="Registrace nového uživatele:";
	$vyplneni_vsech_polozek_je_povinne_lang="Vyplnění všech položek je povinné.";
	$uzivatelske_jmeno_lang="Uživatelské jméno:";
	$jmenoph_lang="Jméno";
	$heslo_lang="Heslo:";
	$hesloph_lang="Heslo";
	$heslo_znovu_lang="Znovu heslo:";
	$heslo_znovuph_lang="Potvrzení hesla";
	$email_lang="E-mail:";
	$emailph_lang="E-mail";
	$zaregistrovat_lang="Zaregistrovat se";
	$prihlaseni_stavajiciho_uzivatele_lang="Přihlášení stávajícího uživatele:";
	$uzivatelseke_jmeno_email_lang="Uživatelské jméno/e-mail:";
	$jmeno_email_lang="Jméno/e-mail";
	$heslo_pro_prihlaseni_lang="Heslo:";
	$heslo_pro_prihlaseniph_lang="Heslo";
	$prihlasit_se_lang="Přihlásit se";
	$poznamka_lang="poznámka:";
	$vase_udaje_nejsou_vyplneni_korektne_lang="Vaše přihlašovací údaje nejsou vyplněny korektně. Opravte prosím chyby ve formuláři.";
	$zadejte_vase_uzivatelske_jmeno_nebo_email_lang="Zadejte Vaše uživatelské jméno nebo e-mail.";
	$uzivatelske_jmeno_nebo_email_neexistuje1_lang="Uživatelské jméno nebo e-mail \"";
	$uzivatelske_jmeno_nebo_email_neexistuje2_lang="\" neexistuje.";
	$zadejte_heslo_lang="Zadejte heslo.";
	$nespravne_heslo_lang="Nesprávné heslo.";
	$vase_udaje_nejsou_vyplneni_korektne2_lang="Vaše registracní údaje nejsou vyplněny korektne. Opravte prosím chyby ve formuláři.";
	$vase_uzivatelske_jmeno_je_jiz_pouzivano1_lang="Vaše uživatelské jméno \"";
	$vase_uzivatelske_jmeno_je_jiz_pouzivano2_lang="\" je již používáno. Zvolte jiné.";
	$jmeno_obsahuje_nepovolene_znaky_lang="Jméno obsahuje nepovolené znaky.";
	$vase_uzivatelske_jmeno_musi_mit_minimalne_tri_znaky1_lang="Vaše uživatelské jméno \"";
	$vase_uzivatelske_jmeno_musi_mit_minimalne_tri_znaky2_lang="\" musí mít minimální délku 3 znaky.";
	$vyplnte_prosim_vase_uzivatelske_jmeno_lang="Vyplňte prosím Vaše uživatelské jméno.";
	$vase_heslo_musi_mit_minimalni_delku_ctyri_znaky_lang="Vaše heslo musí mít minimální délku 4 znaky.";
	$vyplnte_prosim_polozku_heslo_lang="Vyplňte prosím položku \"heslo\".";
	$heslo_a_heslo_se_neshoduji_lang="Vami zadané heslo a heslo pro potvrzení se neshodují.";
	$vyplnte_prosim_polozku_potvrzeni_hesla_lang="Vyplňte prosím položku \"potvrzení hesla\".";
	$zkontrolujte_si_prosim_email_lang="Zkontroluj te si prosím zadaný e-mail, zřejmě není vyplneň správně.";
	$vyplnte_prosim_polozku_email_lang="Vyplňte prosím položku \"e-mail\".";
	$vyborne_vas_ucet_byl_vytvoren1_lang="výborně!";
	$vyborne_vas_ucet_byl_vytvoren2_lang="Váš účet byl úspěšně vytvořen.";
}
if($_SESSION["lang"]==1){
	$uvodchybovezpravy="<div class=\"error_messege alert\"><span class=\"alert_name\">error: </span>";
	$neprihlasen_lang="Not signed";
	$odhlasit_lang="Sign out";
	$zpet_lang="Back";
	$vitejte_lang="Welcome,";
	$jmeno_slozky_lang="Folder name";
	$vytvorit_novou_slozku_lang="Create new folder";
	$nahrat_lang="Nahrát";
	$jmeno_obsahuje_nepovolene_znaky_lang="Folder name contains illegal characters.";
	$toto_jmeno_je_jiz_pouzivano_lang="This folder name is already in use.";
	$registrace_noveho_uzivatele_lang="Create your account:";
	$vyplneni_vsech_polozek_je_povinne_lang="Enter all items is obligatory.";
	$uzivatelske_jmeno_lang="User name:";
	$jmenoph_lang="Name";
	$heslo_lang="Password:";
	$hesloph_lang="Password";
	$heslo_znovu_lang="Password again:";
	$heslo_znovuph_lang="Password confirmation";
	$email_lang="E-mail:";
	$emailph_lang="E-mail";
	$zaregistrovat_lang="Sign up";
	$prihlaseni_stavajiciho_uzivatele_lang="Log in to your account:";
	$uzivatelseke_jmeno_email_lang="User name/e-mail:";
	$jmeno_email_lang="Name/e-mail";
	$heslo_pro_prihlaseni_lang="Password:";
	$heslo_pro_prihlaseniph_lang="Password";
	$prihlasit_se_lang="Sign in";
	$poznamka_lang="note:";
	$vase_udaje_nejsou_vyplneni_korektne_lang="Your sign up information are filled out correctly. Please correct the mistakes.";
	$zadejte_vase_uzivatelske_jmeno_nebo_email_lang="Fill in your user name or e-mail.";
	$uzivatelske_jmeno_nebo_email_neexistuje1_lang="User name or e-mail \"";
	$uzivatelske_jmeno_nebo_email_neexistuje2_lang="\"
does not exist.";
	$zadejte_heslo_lang="Fill in password.";
	$nespravne_heslo_lang="Invalid password.";
	$vase_udaje_nejsou_vyplneni_korektne2_lang="Your sign in information are filled out correctly. Please correct the mistakes.";
	$vase_uzivatelske_jmeno_je_jiz_pouzivano1_lang="This user name \"";
	$vase_uzivatelske_jmeno_je_jiz_pouzivano2_lang="\" is already in use. Choose another.";
	$jmeno_obsahuje_nepovolene_znaky_lang="User name contains illegal characters.";
	$vase_uzivatelske_jmeno_musi_mit_minimalne_tri_znaky1_lang="User name \"";
	$vase_uzivatelske_jmeno_musi_mit_minimalne_tri_znaky2_lang="\" must have at least 3 characters.";
	$vyplnte_prosim_vase_uzivatelske_jmeno_lang="Fill in user name.";
	$vase_heslo_musi_mit_minimalni_delku_ctyri_znaky_lang="Password must have at least 4 characters.";
	$vyplnte_prosim_polozku_heslo_lang="Fill in item \"password\".";
	$heslo_a_heslo_se_neshoduji_lang="Password and password confirmation do not match.";
	$vyplnte_prosim_polozku_potvrzeni_hesla_lang="Fill in item \"password confirmation\".";
	$zkontrolujte_si_prosim_email_lang="Please check entered e-mail probably is not filled in correctly.";
	$vyplnte_prosim_polozku_email_lang="Fill in item \"e-mail\".";
	$vyborne_vas_ucet_byl_vytvoren1_lang="well!";
	$vyborne_vas_ucet_byl_vytvoren2_lang="Your acount have been created.";
}
$conn = mysqli_connect("localhost", "adminroot", "rootadmin", "registrace2");
$formok2=true;
$spravne_jmenoprihlaseni=true;
$spravne_hesloprihlaseni=true;
$prihlaseniok=false;
if(isset($_REQUEST["prihlasit"])){
	$prihlaseniok=true;
	$sql="SELECT ";
	$jmenoprihlaseni=$_REQUEST["jmenoprihlaseni"];
	$hesloprihlaseni=$_REQUEST["hesloprihlaseni"];
	if(!strpos($jmenoprihlaseni,"@")===false){ //kdyz se uzivatel prihlasuje pomoci emailu tak z tabulky vybere emaily
		$sql=$sql."`id_uzivatel`, `email`, `jmeno`, `heslo_SHA1` FROM `uzivatel` WHERE `email`=\"".my_mysql_escape_string($jmenoprihlaseni)."\" LIMIT 1";
	}else{
		$sql=$sql."`id_uzivatel`, `jmeno`, `heslo_SHA1` FROM `uzivatel` WHERE `jmeno`=\"".my_mysql_escape_string($jmenoprihlaseni)."\" LIMIT 1";
	}
	$radekuzivatele=vytahni_z_databaze($sql, $conn);
	if(null==$radekuzivatele){ //pokud prati prazdnou promennou
		$prihlaseniok=false;
		$spravne_jmenoprihlaseni=false;
		$formok2=false;
	}else{
	    if($radekuzivatele["heslo_SHA1"]==sha1($hesloprihlaseni)){
			$prihlaseniok=true;
			$_SESSION["jmeno"]=$jmenoprihlaseni;
			$_SESSION["id_uzivatel"]=$radekuzivatele["id_uzivatel"];
			$sql="SELECT `id_slozky` FROM `slozky` WHERE `id_uzivatel`='".my_mysql_escape_string($_SESSION["id_uzivatel"])."' AND `nadslozka_id` IS NULL LIMIT 1";
			$id_prim_slozky=vytahni_z_databaze($sql, $conn);
			$_SESSION["id_primarni_slozky"]=$id_prim_slozky["id_slozky"];
			$_SESSION["id_aktualni_slozky"]=$_SESSION["id_primarni_slozky"];
			unset($id_prim_slozky);
		}else{
			$prihlaseniok=false;
			$formok2=false;
			$spravne_hesloprihlaseni=false;
		}
	}
} //overeni prihlaseni + zalozeni promenne $conn
?>

<!doctype html>
<html>
<head>
	<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/lightbox.min.js"></script>
<link href="css/lightbox.css" rel="stylesheet" />
<meta charset="utf-8">
<title>Galerie: <?php if(isset($_SESSION["jmeno"])){ print($_SESSION["jmeno"]);}else{print("prihlaseni");};?></title>
<link rel="stylesheet" type="text/css" href="registrace.css">
</head> <!--hlavicka-->

<body>
<?php
if(isset($_REQUEST["odhlasit"])){
	// remove all session variables
session_unset();

// destroy the session
session_destroy();
} //ukonci session po odhlaseni
 ?>
    <div id="header">
        <div id="malyheader"  class="hlavni">
        <?php if(isset($_SESSION["jmeno"])){?>
        <div id="vitejtediv"><?php print($vitejte_lang);?> <span id="vitejte"><?php print($_SESSION["jmeno"]); ?></span>!</div><?php }?>
            <div id="rozklikavatko">
                <ul class="menu">
                <li><div id="ali"><?php if(isset($_SESSION["jmeno"])){print($_SESSION["jmeno"]);}else{print($neprihlasen_lang);}?> <div id="sipka"><img src="pozadi/icon-ios7-arrow-right-128.png" height="10px"/></div></div>
                <ul>
                <?php if(isset($_SESSION["jmeno"])){?>
                <li><form class="headbut" id="logout" action="<?php	print(substr(strrchr($_SERVER['SCRIPT_FILENAME'],"/"),1));?>" method="post">
                    <input class="headbutin" name="odhlasit" type="submit" value="<?php print($odhlasit_lang);?>" id="odhlasit">
                    </form>
                 </li>
                 <?php } ?>
                 <li><form class="headbut" id="cze" action="<?php	print(substr(strrchr($_SERVER['SCRIPT_FILENAME'],"/"),1));?>" method="post">
                    <input class="headbutin" name="cze" type="submit" value="Česky" id="cze">
                    </form>
                 </li>
                 <li><form class="headbut" id="eng" action="<?php	print(substr(strrchr($_SERVER['SCRIPT_FILENAME'],"/"),1));?>" method="post">
                    <input class="headbutin" name="eng" type="submit" value="English" id="eng">
                    </form>
                 </li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
        </div>
    </div>

<?php
if(isset($_SESSION["jmeno"])){
	if(isset($_REQUEST["mkd"])){
		$neplatnejmenoslozky=false;
		$pouzitejmenoslozky=false;
		if(($_REQUEST["foldername"]<>"")){
			$zakazaneznaky="'\";:\\/`*=@# $%^&()+_-,.<>?|";
			for($i=0;$i<strlen($zakazaneznaky);$i++){
				if(!(strpos($_REQUEST["foldername"],$zakazaneznaky[$i])===false)){
					$neplatnejmenoslozky=true;
					break;
				}
			}
			if($neplatnejmenoslozky===false){
				$sql = "SELECT `jmeno` FROM `slozky` WHERE `jmeno`='".my_mysql_escape_string($_REQUEST["foldername"])."' AND `nadslozka_id`=".my_mysql_escape_string($_SESSION["id_aktualni_slozky"])." LIMIT 1";
				$vysledek=vytahni_z_databaze($sql, $conn);
				if((null==$vysledek)){
					mysqli_select_db("registrace2", $conn);
					$sql = "INSERT INTO slozky (id_uzivatel, jmeno, nadslozka_id)	VALUES ('".my_mysql_escape_string($_SESSION["id_uzivatel"])."', '".$_REQUEST["foldername"]."', '".$_SESSION["id_aktualni_slozky"]."')";
					if (!($conn->query($sql) === TRUE)) { //vytvori novou slozku a novy zaznam v databazi
						print("Kryticka chyba: " . $sql . "<br>" . $conn->error."</div>");
					}
				}else{
					$pouzitejmenoslozky=true;
				}
			}
		}else{
			$neplatnejmenoslozky=true;
		}
	} //vytvori novou slozku a novy zaznam v databazi pokud uzivatel klikl na mkdir

	if(isset($_REQUEST["back"])){
		$sql="SELECT `nadslozka_id` FROM `slozky` WHERE `id_slozky`=".my_mysql_escape_string($_SESSION["id_aktualni_slozky"]);
		$id_akt_slozky=vytahni_z_databaze($sql, $conn);
		if(null==$id_akt_slozky){
			$_SESSION["id_aktualni_slozky"]=$_SESSION["id_primarni_slozky"];
		}else{
			$_SESSION["id_aktualni_slozky"]=$id_akt_slozky["nadslozka_id"];
		}
		unset($id_akt_slozky);
	}
	if(isset($_REQUEST["folder"])){
		$sql="SELECT `id_slozky` FROM `slozky` WHERE `jmeno`='".$_REQUEST["folder"]."' AND `nadslozka_id`='".my_mysql_escape_string($_SESSION["id_aktualni_slozky"])."' LIMIT 1";

		$id_akt_slozky=vytahni_z_databaze($sql, $conn);
		$_SESSION["id_aktualni_slozky"]=$id_akt_slozky["id_slozky"];
		unset($id_akt_slozky);
	}
	?>
	<main class="hlavni" id="main">
	<div class="panel panel-success">
		<div class="panel-heading flex-container2">

            <form id="newfolderorback" action="<?php (substr(strrchr($_SERVER['SCRIPT_FILENAME'],"/"),1)) ?>" method="post"> <div id="folorback">
	<?php
	if($_SESSION["id_aktualni_slozky"]<>$_SESSION["id_primarni_slozky"]){	//form s ifem na pole pro vytvoreni nove slozky nebo navratu do domovske slozky
		print("<input class=\"button\" name=\"back\" type=\"submit\" value=\"".$zpet_lang."\" id=\"back\">");
		print("</div></form><form action=".(substr(strrchr($_SERVER['SCRIPT_FILENAME'],"/"),1))." method=\"post\"> <div id=\"folorback\">");
		print("<input id=\"novaslozka\"placeholder=\"".$jmeno_slozky_lang."\" class=\"form-control\" name=\"foldername\" value=\"");
		if(isset($_REQUEST["foldername"])){
			print($_REQUEST["foldername"]);
		}
		print("\" type=\"text\" pattern=\"{2,30}\" maxlength=\"30\" id=\"foldername\"><input class=\"button\" name=\"mkd\" type=\"submit\" value=\"".$vytvorit_novou_slozku_lang."\" id=\"mkd\">");

	}else{
    	print("<input id=\"novaslozka\"placeholder=\"".$jmeno_slozky_lang."\" class=\"form-control\" name=\"foldername\" value=\"");
		if(isset($_REQUEST["foldername"])){
			print($_REQUEST["foldername"]);
		}
		print("\" type=\"text\" pattern=\"{2,30}\" maxlength=\"30\" id=\"foldername\"><input class=\"button\" name=\"mkd\" type=\"submit\" value=\"".$vytvorit_novou_slozku_lang."\" id=\"mkd\">");
	}
	?></div></form>

    	</div>  <!--uvodni lista-->
    	<div class="flex-container2">

	<?php
	$uploadDir = "./registrace/velke"; // adresar, kam se maji nahrat obrazky (bez lomitka na konci)
	$allowedExt = array('jpg', 'jpeg', 'png', 'gif'); // pole s povolenymi priponami
	if(isset($_FILES['obrazky']) && is_array($_FILES['obrazky']['name'])){ // zpracovani uploadu

		$counter = 0;
		$allowedExt = array_flip($allowedExt);
		foreach($_FILES['obrazky']['name'] as $klic => $nazev) {
			$fileName = basename($nazev);
			$tmpName = $_FILES['obrazky']['tmp_name'][$klic];
			// kontrola souboru
			if(
						!is_uploaded_file($tmpName)
						|| !isset($allowedExt[strtolower(pathinfo($fileName, PATHINFO_EXTENSION))])
					) {
						// neplatny soubor nebo pripona
						continue;
					}
			if((strrchr($fileName,".")==".jpg") || (strrchr($fileName,".")==".JPG") || (strrchr($fileName,".")==".jpeg") || (strrchr($fileName,".")==".JPEG")){
				$format=1;
			}
			if((strrchr($fileName,".")==".png") || (strrchr($fileName,".")==".PNG")){
				$format=2;
			}
			if((strrchr($fileName,".")==".gif") || (strrchr($fileName,".")==".GIF")){
				$format=3;
			}
			mysqli_select_db("registrace2", $conn);
			$sql = "INSERT INTO `obrazky` (id_uzivatel, id_slozky, format)	VALUES ('".my_mysql_escape_string($_SESSION["id_uzivatel"])."', '".my_mysql_escape_string($_SESSION["id_aktualni_slozky"])."', '".$format."')";

				if (!(($conn->query($sql) === TRUE))) { //vytvori zaznam v databazi
					print("<div>Kryticka chyba: " . $sql . "<br>" . $conn->error."</div>");
				}

			$id_prave_ukladaneho_obrazku=mysqli_insert_id($conn);
			// presun souboru

			if(move_uploaded_file($tmpName, "./registrace/nahrane".DIRECTORY_SEPARATOR."{$fileName}")) { //nahraje do adreare a vytvori miniaturu
				++$counter;
				rename("./registrace/nahrane".DIRECTORY_SEPARATOR."{$fileName}",$uploadDir.DIRECTORY_SEPARATOR.$id_prave_ukladaneho_obrazku.strrchr($fileName,"."));
				$sirka=70; //vyska
				$informace = getimagesize("{$uploadDir}".DIRECTORY_SEPARATOR.$id_prave_ukladaneho_obrazku.strrchr($fileName,"."));
				$width=$informace[0]/$informace[1]*$sirka;
				$height=$sirka;
				$maly=imagecreatetruecolor($width,$height);
				$obr=imageCreateFromAny("{$uploadDir}".DIRECTORY_SEPARATOR.$id_prave_ukladaneho_obrazku.strrchr($fileName,"."));
				imagecopyresized($maly,$obr,0,0,0,0,$width,$height,$informace[0],$informace[1]);
				imagejpeg ($maly, "./registrace/male/".$id_prave_ukladaneho_obrazku.strrchr($fileName,"."), 70);
			}else{
			print("<div>Kryticka chyba: nene");
		}
		}
		$pocet_nahranych_obrazku=$counter;
	}  //nahrani obrazku



			function vytiskni_obrazky_a_slozky_ve_slozce (&$idslozka,&$conn){
				$sql="SELECT `jmeno` FROM `slozky` WHERE `nadslozka_id`=".$idslozka;
				mysqli_select_db("registrace2", $conn);
				$vysledek=mysqli_query($conn, $sql);
				if(!(null==$vysledek)){
					while($slozkyveslozce=mysqli_fetch_array($vysledek)){
						print("<div class=\"flex-item slozka\"><form id=\"".$slozkyveslozce["jmeno"]."\" action=\"".(substr(strrchr($_SERVER['SCRIPT_FILENAME'],"/"),1))."\" method=\"post\">");
						print("<input name=\"jmenoslozky\" type=\"hidden\" id=\"jmenoslozky\" value=\"".$slozkyveslozce["jmeno"]."\">"); //form pro prechod do slozky, tlacitko
			print("<input class=\"button\" name=\"folder\" type=\"submit\" value=\"".$slozkyveslozce["jmeno"]."\" id=\"".$slozkyveslozce["jmeno"]."input\"></form></div>");
					}
				}
				$sql="SELECT `id_obrazky`, formaty.`format` FROM `obrazky` INNER JOIN `formaty` ON obrazky.`format` = formaty.`id_formaty` WHERE `id_slozky`=".$idslozka;
				mysqli_select_db("registrace2", $conn);
				$vysledek=mysqli_query($conn, $sql);
				if(!(null==$vysledek)){
					while($obrazkyveslozce=mysqli_fetch_array($vysledek)){
						$popisek=substr($obrazkyveslozce["id_obrazky"],0,strrpos($obrazkyveslozce["id_obrazky"],".")); //jeste to chce urezat pravy popisek z adresy
						print("<div oncontextmenu=\"menu(); return false;\" class=\"flex-item\"><a href=\"./registrace/velke/".$obrazkyveslozce["id_obrazky"].".".$obrazkyveslozce["format"]."\" data-lightbox=\"image-1\" data-title=\"".$popisek."\"><img height=\"55px\" class=\"img\" src=\"./registrace/male/".$obrazkyveslozce["id_obrazky"].".".$obrazkyveslozce["format"]."\" alt=\"".$popisek."\"/></a></div>");
					}
				}

			}
			vytiskni_obrazky_a_slozky_ve_slozce ($_SESSION["id_aktualni_slozky"],$conn);
			?>
            </div>

		<form id="nahrat" method="post" enctype="multipart/form-data" action="<?php (substr(strrchr($_SERVER['SCRIPT_FILENAME'],"/"),1))?>">
			<input class="button" type="file" name="obrazky[]" multiple/>
			<input class="button" type="submit" value="<?php print($nahrat_lang);?>" />
		</form>
<p>&nbsp;</p>
</div>
        </div>
    </div>

</main>
<div class="hlavni">
<?php
if((isset($neplatnejmenoslozky)) and ($neplatnejmenoslozky===true)){
		print($uvodchybovezpravy.$jmeno_obsahuje_nepovolene_znaky_lang."</div>");
	}
if((isset($pouzitejmenoslozky)) and ($pouzitejmenoslozky===true)){
		print($uvodchybovezpravy.$toto_jmeno_je_jiz_pouzivano_lang."</div>");
	}
?>
</div><?php
}else{
?>
<main class="hlavni flex-container2" id="main">
<form class="form-horizontal flex" id="registrace" action="<?php print(substr(strrchr($_SERVER['SCRIPT_FILENAME'],"/"),1));
	?>" method="post">
	<?php
	$formok = true;
	$spravne_jmeno = true;
	$spravne_helso = true;
	$spravne_potvrzenihesla = true;
	$spravne_email = true;
	$jmeno_pouzite= false;
	$jmeno_obsahuje_zav=false;
	if(isset($_REQUEST["odeslat"])){
		if (isset($_REQUEST["jmeno"])){
			$jmeno = $_REQUEST["jmeno"];
			$zakazaneznaky="'\";:\\/`*=@#$ %^&()+_-,.<>?|";
			for($i=0;$i<strlen($zakazaneznaky);$i++){
				if(!strpos($jmeno,$zakazaneznaky[$i])===false){
					$formok = false;
					$jmeno_obsahuje_zav=true;
					$formok = false;
					$spravne_jmeno=false;
				}
			}
			if($jmeno<>""){
			if($jmeno_obsahuje_zav===false){
				mysqli_select_db("registrace2", $conn); //overeni jestli uz neexistuje uzivatel se stejnym jmenem
				$jmenop=mysqli_query($conn, "SELECT `jmeno` FROM `uzivatel` WHERE `jmeno`= '".$jmeno."' LIMIT 1");
				$jmenop=mysqli_fetch_array($jmenop);
				$jmenop=($jmenop["jmeno"]);
				if($jmenop==$jmeno){
					$jmeno_pouzite=true;
					$formok = false;
				}
			}
			}else{
				$jmeno_neni=true;
				$spravne_jmeno=false;
			}
		}else{
			$spravne_jmeno=false;
		}
		if (isset($_REQUEST["heslo"])){
			$heslo = $_REQUEST["heslo"];
			if(strlen($heslo)<=3){
				$formok = false;
				$spravne_helso=false;
			}
		}else{
			$spravne_helso=false;

		}
		if (isset($_REQUEST["potvrzenihesla"])){
			$potvrzenihesla = $_REQUEST["potvrzenihesla"];
			if(strlen($potvrzenihesla)<=3){
				$formok = false;
				$spravne_potvrzenihesla=false;
			}
			if($heslo<>$potvrzenihesla){
				$formok = false;
				$spravne_potvrzenihesla=false;
			}
			if (isset($_REQUEST["email"])){
				$email = $_REQUEST["email"];
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$formok = false;
					$spravne_email=false;
				}
			}
		}else{
			$spravne_potvrzenihesla=false;
		}
	} //overeni dat zadanych do formulare registrace
?>
		<h2><?php print($registrace_noveho_uzivatele_lang);?></h2>
		<p><?php print($vyplneni_vsech_polozek_je_povinne_lang);?></p>
		<div class="form-group">
        <label for="jmeno" class="controle-lable"><?php print($uzivatelske_jmeno_lang);?></label>
        <div class="div_form_control">
			<input placeholder="<?php print($jmenoph_lang);?>" class="<?php
			if(($spravne_jmeno===false) or ($jmeno_pouzite===true) or($jmeno_obsahuje_zav===true)){
				print("blbe");
			}
			?> txpole form-control" name="jmeno" type="text" maxlength="60" id="jmeno" value="<?php
			if (isset($jmeno)){
				print($jmeno);
			}
	?>">
    </div>
		 </div>
         <div class="form-group">
		 <label for="heslo" class="controle-lable"><?php print($heslo_lang);?></label>
         <div class="div_form_control">
			<input placeholder="<?php print($hesloph_lang);?>" class="<?php if($spravne_helso===false){print("blbe");} ?> txpole form-control" name="heslo" type="password" maxlength="60" id="heslo">
		</div>
        </div>
        <div class="form-group">
		 <label for="potvrzenihesla" class="controle-lable"><?php print($heslo_znovu_lang);?></label>
         <div class="div_form_control">
			<input placeholder="<?php print($heslo_znovuph_lang);?>" class="<?php if($spravne_potvrzenihesla===false){print("blbe");} ?> txpole form-control" name="potvrzenihesla" type="password" maxlength="60" id="potvrzenihesla" onkeyup="checkPass(); return false;">
		</div>
        </div>
        <div class="form-group">
		 <label for="email" class="controle-lable"><?php print($email_lang);?></label>
         <div class="div_form_control">
			<input placeholder="<?php print($emailph_lang);?>" class="<?php if($spravne_email===false){print("blbe");} ?> txpole form-control" name="email" type="text" maxlength="60" id="email" value="<?php
			if (isset($email)){
				print($email);
			}
	?>">
	</div>
    </div>
	<p><input class="button" name="odeslat" type="submit" value="<?php print($zaregistrovat_lang);?>" id="odeslat">

	</fieldset>
	</form> <!--formular registrace + overeni dat-->
<?php
if(($formok===true) and (isset($_REQUEST["odeslat"]))){ //aby po uspesnem zalozeni uctu nemusel uzivatel vyplnovat jmeno pro prihlaseni
	$jmenoprihlaseni=$jmeno;
}
?>
	<form class="form-horizontal flex" id="prihlaseni" action="
	<?php
	print(substr(strrchr($_SERVER['SCRIPT_FILENAME'],"/"),1));
	?>
	" method="post">

	<h2><?php print($prihlaseni_stavajiciho_uzivatele_lang);?></h2>
		<div class="form-group">
        <label for="jmenoprihlaseni" class="controle-lable"><?php print($uzivatelseke_jmeno_email_lang);?></label>
        <div class="div_form_control">
			<input placeholder="<?php print($jmeno_email_lang);?>" class="<?php
			if($spravne_jmenoprihlaseni===false){
				print("blbe");
			}
			?> txpole form-control" name="jmenoprihlaseni" type="text" maxlength="60" id="jmenoprihlaseni" value="<?php
			if (isset($jmenoprihlaseni)){
				print($jmenoprihlaseni);
			}
	?>">
    </div>
    </div>

		 <div class="form-group">
         <label for="hesloprihlaseni" class="controle-lable"><?php print($heslo_pro_prihlaseni_lang);?></label>
         <div class="div_form_control">
			<input placeholder="<?php print($heslo_pro_prihlaseniph_lang);?>" class="<?php if (isset($_REQUEST["hesloprihlaseni"])){
				$hesloprihlaseni = $_REQUEST["hesloprihlaseni"];
				if(strlen($hesloprihlaseni)<=3){
					print("blbe");
					$formok2 = false;
					$spravne_hesloprihlaseni=false;
				}
			}?> txpole form-control" name="hesloprihlaseni" type="password" maxlength="60" id="hesloprihlaseni">
			</div>
            </div>

	<p><input class="button" name="prihlasit" type="submit" value="<?php print($prihlasit_se_lang);?>" id="prihlasit">
	</form> <!--formular prihlaseni-->
</main>
<div class="hlavni">
<?php
if(($formok2===false) and (isset($_REQUEST["prihlasit"]))){
	print("<div class=\"pozn alert\"><span class=\"alert_name\">".$poznamka_lang." </span>".$vase_udaje_nejsou_vyplneni_korektne_lang."</div>");
	if($spravne_jmenoprihlaseni===false){
		if($jmenoprihlaseni==""){
			print($uvodchybovezpravy.$zadejte_vase_uzivatelske_jmeno_nebo_email_lang."</div>");
		}else{
			print($uvodchybovezpravy.$uzivatelske_jmeno_nebo_email_neexistuje1_lang.$jmenoprihlaseni.$uzivatelske_jmeno_nebo_email_neexistuje2_lang."</div>");
		}
	}
	if($spravne_hesloprihlaseni===false){
		if($hesloprihlaseni==""){
			print($uvodchybovezpravy.$zadejte_heslo_lang."</div>");
		}else{
			print($uvodchybovezpravy.$nespravne_heslo_lang."</div>");
		}
	}
} //chybove hlasky pro prihlaseni
if(($formok===false) and (isset($_REQUEST["odeslat"]))){
	print("<div class=\"pozn alert\"><span class=\"alert_name\">".$poznamka_lang." </span>".$vase_udaje_nejsou_vyplneni_korektne2_lang."</div>");
	if($jmeno_pouzite===true){
		print($uvodchybovezpravy.$vase_uzivatelske_jmeno_je_jiz_pouzivano1_lang.$jmeno.$vase_uzivatelske_jmeno_je_jiz_pouzivano2_lang."</div>");
	}
	if($jmeno_obsahuje_zav===true){
		print($uvodchybovezpravy.$jmeno_obsahuje_nepovolene_znaky_lang."</div>");
	}
	if($spravne_jmeno===false){
		if($jmeno<>""){
			print($uvodchybovezpravy.$vase_uzivatelske_jmeno_musi_mit_minimalne_tri_znaky1_lang.$jmeno."</div>");
		}
	}
	if(isset($jmeno_neni)){
		print($uvodchybovezpravy.$vyplnte_prosim_vase_uzivatelske_jmeno_lang."</div>");
	}
	if($spravne_helso===false){
		if($heslo<>""){
			print($uvodchybovezpravy.$vase_heslo_musi_mit_minimalni_delku_ctyri_znaky_lang."</div>");
		}else{
			print($uvodchybovezpravy.$vyplnte_prosim_polozku_heslo_lang."</div>");
		}
	}
	if($spravne_potvrzenihesla===false){
		if($potvrzenihesla<>""){
			print($uvodchybovezpravy.$heslo_a_heslo_se_neshoduji_lang."</div>");
		}else{
			print($uvodchybovezpravy.$vyplnte_prosim_polozku_potvrzeni_hesla_lang."</div>");
		}
	}
	if($spravne_email===false){
		if($email<>""){
			print($uvodchybovezpravy.$zkontrolujte_si_prosim_email_lang."</div>");
		}else{
			print($uvodchybovezpravy.$vyplnte_prosim_polozku_email_lang."</div>");
		}
	}
} //chybove hlasky pro registraci
if(($formok===true) and (isset($_REQUEST["odeslat"]))){
	// Check connection
	if(!$conn){
		print($uvodchybovezpravy."Pripojeni selhalo: " . $conn->connect_error)."</div>";
	}else{
		mysqli_select_db("registrace2", $conn);
		$sql = "INSERT INTO uzivatel (jmeno, heslo_SHA1, email)	VALUES ('".$jmeno."', '".sha1($heslo)."', '".$email."')";
		if (($conn->query($sql) === TRUE)) {
			$id_uzivatele_pro_slozku=mysqli_insert_id($conn);
			$sql="INSERT INTO slozky (id_uzivatel, jmeno)	VALUES ('".$id_uzivatele_pro_slozku."', '".$jmeno."')";
			$conn->query($sql);
			print("<div class=\"zelena alert\"><span class=\"alert_name\">".$vyborne_vas_ucet_byl_vytvoren1_lang." </span>".$vyborne_vas_ucet_byl_vytvoren2_lang."</div>");
		} else {
			print($uvodchybovezpravy."Kryticka chyba: " . $sql . "<br>" . $conn->error."</div>");
		}
		$conn->close();
	}
} //vlozeni noveho uzivatele do tabulky + vytvoreni noveho adresare //uvodni stranka
}?> <!--//funkcni registrace-->
</div>
</body>
</html>

</body>
</html>

<script>
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('heslo');
    var pass2 = document.getElementById('potvrzenihesla');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "V pořádku!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Heslo se neshoduje!"
    }
}
function menu(){
var menu = [{
        name: 'create',
        img: 'images/create.png',
        title: 'create button',
        fun: function () {
            alert('i am add button')
        }
    }, {
        name: 'update',
        img: 'images/update.png',
        title: 'update button',
        fun: function () {
            alert('i am update button')
        }
    }, {
        name: 'delete',
        img: 'images/delete.png',
        title: 'delete button',
        fun: function () {
            alert('i am delete button')
        }
    }];
	return menu;
}
</script>
