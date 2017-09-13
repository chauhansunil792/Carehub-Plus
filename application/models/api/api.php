<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Model
{
	public $responsedata = array();
	public $bulkdata     = array();
	
	public function iwmf_jsondecode($string="")
	{
		try
		{
			$output_array = array();
			$this->bulkdata = $output_array = json_decode($string, true);
			return $output_array;
		}
		catch (Exception $e)
		{
			echo "Error message: " . $e->getMessage() . "\n";
		}
	}
	
	public function iwmf_jsonencode($input_array=array())
	{
		try
		{
			$input_array = $this->arraywalkfun($input_array,'removenull');
			$this->responsedata = $json_string = json_encode($input_array);
			return $json_string;
		}
		catch (Exception $e)
		{
			echo "Error message: " . $e->getMessage() . "\n";
		}
	}
	
	public function iwmf_jsonrender()
	{
		echo $this->responsedata;
		exit;
	}
	
	public function arraywalkfun($arr,$fun = '')
	{
		if($fun != "")
		{
			array_walk_recursive($arr,$fun);
			return $arr;
		}
	}
	
	public function response_message($language = '')
	{  //'Arabic','English','French','Hebrew','Spanish','Turkish'
		if($language && $language == 'ES') //Spanish
		{
			$response_message = array(
						'INVALID_PARAMS' => 'Parametros no validos',
						'ADDED' => 'Anadido exito',
						'CREATED' => 'Creado con exito',
						'UPDATED' => 'Actualizado correctamente',
						'LISTED' => 'Listado con exito',
						'NODATA' => 'No hay datos disponibles',
						'WRONG' => 'Algo es incorrecto',
						'DELETED' => 'eliminado correctamente',
						'AUTHFAIL' => 'autenticacion de Falla',
						'AUTHENTICATED' => 'autenticacion con exito',
						'FILL_ALL_INFO'=> 'Por favor, llene toda la informacion',
						'USEREXITS' => 'Nombre de usuario ya existe.',
						'EMAILEXITS' => 'Email ya existen.',
						'PASSWORD_CHANGE' => 'Contrasena Cambiar exito. Conocer tu contrasena Revise su correo electronico',
						'PASSWORD_NOT_CHANGE' => 'Contrasena no cambia con exito.',
						'AVAILABLE' => 'Nombre de usuario y correo electronico esta disponible',
						'CHECKIN_ALREADY_MISSED' => 'Este registro ya se perdio',
						'CHECKIN_ALREADY_CLOSED' => 'Este registro ya cerrado',
						'SIGN_OUT_SUCCESSFULY' => 'Firmado a cabo con exito',
						'ENTER_CORRECT_PASSWORD' => 'Introduzca la contrasena correcta',
						'EMAIL_NOT_EXIST_ENTER_CORRECT_EMAIL' => ' No existe. Introduzca correcta Email',
						'INVALID_USERNAME' => 'Nombre de usuario no valido',
						'CONFIRMED_SOS_IN_ACTIVE_CIRCLE' => 'Usted debe tener al menos un SOS Contacto Confirmado en su circulo activo para usar Reporta.',
						'CONFIRMED_SOS_IN_CONTACTS' => 'Usted debe tener al menos un SOS Contacto Confirmado utilizar Reporta.',
						'EMAIL_SEND' => 'Email Send Successfully',
					);
		}
		elseif($language && $language == 'FR')  // Franch
		{
			$response_message = array(
						'INVALID_PARAMS' => 'Parametres incorrects',
						'ADDED' => 'ajoute avec succes',
						'CREATED' => 'cree avec succes',
						'UPDATED' => 'Mise a jour avec succes',
						'LISTED' => 'Inscrite succes',
						'NODATA' => 'Aucune donnee disponible',
						'WRONG' => 'Quelque chose ne va',
						'DELETED' => 'supprime avec succes',
						'AUTHFAIL' => 'Authentication Fail',
						'AUTHENTICATED' => 'authentification succes',
						'FILL_ALL_INFO'=> 'Se il vous plait Remplissez toutes les informations sur',
						'USEREXITS' => "Nom d'utilisateur existe deja.",
						'EMAILEXITS' => 'Email deja exister.',
						'PASSWORD_CHANGE' => 'Mot de passe le changement avec succes. Pour connaitre votre mot de passe verifier votre Email',
						'PASSWORD_NOT_CHANGE' => 'Mot de passe Pas le changement avec succes.',
						'AVAILABLE' => "Nom d'utilisateur et Email est disponible",
						'CHECKIN_ALREADY_MISSED' => 'Ce checkin deja manque',
						'CHECKIN_ALREADY_CLOSED' => 'Ce checkin deja ferme',
						'SIGN_OUT_SUCCESSFULY' => 'Signe avec succes',
						'ENTER_CORRECT_PASSWORD' => 'Entrez le mot de passe correct',
						'EMAIL_NOT_EXIST_ENTER_CORRECT_EMAIL' => ' Ne existerait pas. Entrez correcte Email',
						'INVALID_USERNAME' => 'Invalid Username',
						'CONFIRMED_SOS_IN_ACTIVE_CIRCLE' => 'Vous devez avoir au moins un SOS Contactez Confirme dans votre cercle actif pour utiliser Reporta.',
						'CONFIRMED_SOS_IN_CONTACTS' => 'Vous devez avoir au moins un SOS Contactez Confirme a utiliser Reporta.',
						'EMAIL_SEND' => 'Email Send Successfully',
					);
		}
		
		elseif($language && $language == 'AR') //Arabic
		{
			$response_message = array(
						'INVALID_PARAMS' => 'معلمات غير صالح',
						'ADDED' => 'وأضاف بنجاح',
						'CREATED' => 'خلق بنجاح',
						'UPDATED' => 'تحديث بنجاح',
						'LISTED' => 'المدرج بنجاح',
						'NODATA' => 'لا توجد بيانات متاحة',
						'WRONG' => 'هناك شيئا خطأ',
						'DELETED' => 'حذف بنجاح',
						'AUTHFAIL' => 'المصادقة فشل',
						'AUTHENTICATED' => 'المصادقة الناجحة',
						'FILL_ALL_INFO'=> 'يُرجى ملء كافة المعلومات',
						'USEREXITS' => "اسم المستخدم موجودة بالفعل",
						'EMAILEXITS' => 'البريد الإلكتروني الموجودة بالفعل',
						'PASSWORD_CHANGE' => 'تغيير كلمة المرور بنجاح. لمعرفة كلمة المرور الخاصة بك تحقق من بريدك الالكتروني',
						'PASSWORD_NOT_CHANGE' => 'كلمة المرور لم تتغير بنجاح',
						'AVAILABLE' => "اسم المستخدم والبريد الإلكتروني هل متاح",
						'CHECKIN_ALREADY_MISSED' => 'هذا تحقق في غاب بالفعل',
						'CHECKIN_ALREADY_CLOSED' => 'هذا تحقق في مغلقة بالفعل',
						'SIGN_OUT_SUCCESSFULY' => 'وقعت خارج بنجاح',
						'ENTER_CORRECT_PASSWORD' => 'أدخل كلمة المرور الصحيحة',
						'EMAIL_NOT_EXIST_ENTER_CORRECT_EMAIL' => ' لا يوجد. أدخل البريد الإلكتروني الصحيح',
						'INVALID_USERNAME' => 'اسم المستخدم غير صالح',
						'CONFIRMED_SOS_IN_ACTIVE_CIRCLE' => 'يجب أن يكون لديك واحد على الأقل SOS الاتصال المؤكدة في دائرة الخاص بك نشطة لاستخدام تقارير',
						'CONFIRMED_SOS_IN_CONTACTS' => 'Reporta مؤكدة واحدة على الأقل لإستعمال SOS يجب أن يكون لديك جهة إتصال',
						'EMAIL_SEND' => 'البريد الإلكتروني أرسل بنجاح',
					);
		}
		
		elseif($language && $language == 'IW') //Hebrew
		{
			$response_message = array(
						'INVALID_PARAMS' => 'פרמטרים לא חוקיים',
						'ADDED' => 'נוסף בהצלחה',
						'CREATED' => 'נוצר בהצלחה',
						'UPDATED' => 'עודכן בהצלחה',
						'LISTED' => 'רשום בהצלחה',
						'NODATA' => 'אין נתונים זמינים',
						'WRONG' => 'משהו לא בסדר',
						'DELETED' => 'נמחק בהצלחה',
						'AUTHFAIL' => 'Authentication Fail',
						'AUTHENTICATED' => 'אימות מוצלחת',
						'FILL_ALL_INFO'=> 'אנא מלא מידע כל',
						'USEREXITS' => "שם משתמש כבר קיים.",
						'EMAILEXITS' => 'דוא"ל כבר קיימים',
						'PASSWORD_CHANGE' => 'סיסמא שונתה בהצלחה. לדעת את הסיסמה שלך לבדוק דוא"ל שלך',
						'PASSWORD_NOT_CHANGE' => 'סיסמא לא שונתה בהצלחה',
						'AVAILABLE' => "שם משתמש ודואר אלקטרוני זמין",
						'CHECKIN_ALREADY_MISSED' => 'This checkin already missed',
						'CHECKIN_ALREADY_CLOSED' => 'This checkin already closed',
						'SIGN_OUT_SUCCESSFULY' => 'נחתם בהצלחה',
						'ENTER_CORRECT_PASSWORD' => 'הזן סיסמא נכונה',
						'EMAIL_NOT_EXIST_ENTER_CORRECT_EMAIL' => ' לא קיימים. הזן את כתובת הדוא"ל נכון',
						'INVALID_USERNAME' => 'שם משתמש לא חוקי',
						'CONFIRMED_SOS_IN_ACTIVE_CIRCLE' => 'אתה חייב להיות קשר שאושרו SOS לפחות אחת במעגל הפעיל להשתמש דוחות',
						'CONFIRMED_SOS_IN_CONTACTS' => 'אתה חייב להיות לפחות איש קשר אחד SOS שאושרו לשימוש דוחות',
						'EMAIL_SEND' => 'Email Send Successfully',
					);
		}
		
		elseif($language && $language == 'TR') //Turkish
		{
			$response_message = array(
						'INVALID_PARAMS' => 'Geçersiz Parametreler',
						'ADDED' => 'başarıyla eklendi',
						'CREATED' => 'başarıyla düzenlendi',
						'UPDATED' => 'başarıyla Güncellendi',
						'LISTED' => 'başarıyla listelenen',
						'NODATA' => 'Mevcut Veri Yok',
						'WRONG' => 'Bir şey yanlış',
						'DELETED' => 'başarıyla silindi',
						'AUTHFAIL' => 'Kimlik Doğrulama Başarısız',
						'AUTHENTICATED' => 'Başarılı Kimlik Doğrulama',
						'FILL_ALL_INFO'=> 'Tüm bilgiler doldurunuz',
						'USEREXITS' => "Kullanıcı adı Zaten Var.",
						'EMAILEXITS' => 'E-posta Zaten Var',
						'PASSWORD_CHANGE' => 'Şifre Başarıyla Değiştirildi. Şifreniz e-posta kontrol bilme',
						'PASSWORD_NOT_CHANGE' => 'Şifre Başarıyla Değiştirildi Değil',
						'AVAILABLE' => "Kullanıcı adı ve E-posta Kullanılabilir",
						'CHECKIN_ALREADY_MISSED' => 'This checkin already missed',
						'CHECKIN_ALREADY_CLOSED' => 'This checkin already closed',
						'SIGN_OUT_SUCCESSFULY' => 'Başarıyla Çıkan İmzalı',
						'ENTER_CORRECT_PASSWORD' => 'Doğru Parolayı girin',
						'EMAIL_NOT_EXIST_ENTER_CORRECT_EMAIL' => ' Var değil. Doğru E-posta girin',
						'INVALID_USERNAME' => 'Geçersiz Kullanıcı Adı',
						'CONFIRMED_SOS_IN_ACTIVE_CIRCLE' => 'Sen Raporlar kullanmak için etkin daire en az biri SOS Onaylandı İletişim olmalı',
						'CONFIRMED_SOS_IN_CONTACTS' => 'Sen Raporları kullanmak için en az bir SOS Onaylandı İletişim olmalı',
						'EMAIL_SEND' => 'Email Send Successfully',
					);
		}
		else
		{
			$response_message = array(
						'INVALID_PARAMS' => 'Invalid Parameters',
						'ADDED' => 'Added Successfully',
						'CREATED' => 'Created Successfully',
						'UPDATED' => 'Updated Successfully',
						'LISTED' => 'Listed Successfully',
						'NODATA' => 'No Data Available',
						'WRONG' => 'Something is Wrong',
						'DELETED' => 'Deleted Successfully',
						'AUTHFAIL' => 'Authentication Fail',
						'AUTHENTICATED' => 'Authentication Successfully',
						'FILL_ALL_INFO'=> 'Please Fill All Information',
						'USEREXITS' => 'User Name Already Exist.',
						'EMAILEXITS' => 'Email Already Exist.',
						'PASSWORD_CHANGE' => 'Password Change Successfully. To know your password check your Email',
						'PASSWORD_NOT_CHANGE' => 'Password Not Change Successfully.',
						'AVAILABLE' => 'User Name And Email Is Available',
						'CHECKIN_ALREADY_MISSED' => 'This checkin already missed',
						'CHECKIN_ALREADY_CLOSED' => 'This checkin already closed',
						'SIGN_OUT_SUCCESSFULY' => 'Signed Out Successfully',
						'ENTER_CORRECT_PASSWORD' => 'Enter Correct Password',
						'EMAIL_NOT_EXIST_ENTER_CORRECT_EMAIL' => ' Not Exist. Enter correct Email',
						'INVALID_USERNAME' => 'Invalid Username',
						'EMAIL_SEND' => 'Email Send Successfully',
						'CONFIRMED_SOS_IN_ACTIVE_CIRCLE' => 'A Friend Unlock Contact Must be Selected Please designate at least one Private Circle contact as a Friend Unlock contact.',
						'CONFIRMED_SOS_IN_CONTACTS' => 'You must have at least One SOS Confirmed Contact to use Reporta.',
					);
		}
		//'CONFIRMED_SOS_IN_ACTIVE_CIRCLE' => 'You must have at least One SOS Confirmed Contact in your active circle to use Reporta.',
		return $response_message;
	}
	
}

function removenull(&$value, $key)
{
	if ($value === null)
	{
		$value = "";
	}
}
?>