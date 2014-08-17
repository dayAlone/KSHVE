<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Как помочь Школе");
?>
<p>Благотворительные пожертвования крайне важны для поддержки социальных программ Кремлевской школы 
	верховой езды. Ваше пожертвование будет способствовать реализации нашей Миссии:<br/> Культура и традиции 
	верховой езды – на благо людям.</p>
<p>Пожалуйста, рассмотрите возможность сделать Ваш вклад уже сегодня.</p>
<p>Ваше пожертвование станет важным ресурсом для возрождения национальных традиций верховой езды.</p>
<p><a href="" class="blue-button show-form" target="_blank">Сделать пожертвование</a></p>


<form class="oplata_uslug" style="display:none" action="https://payments.paysecure.ru/pay/order.cfm" method="post" target="_parent">
<p>Поля, отмеченные знаком " <strong>*</strong> ", <strong>обязательны для заполнения</strong>.</p>
<label><input type="text" name="OrderNumber" value="">* Номер заказа</label> <label><input type="text" name="OrderAmount" value="">* Сумма платежа в рублях</label><label><input type="text" name="OrderReserve" value="">* Получатель услуг</label> <label><input type="text" name="Comment" value="">Комментарий к платежу</label> <label><input type="text" name="FirstName" value="">Имя</label> <label><input type="text" name="MiddleName" value="">Отчество</label> <label><input type="text" name="LastName" value="">Фамилия</label> <label><input type="text" name="Email" value="">Адрес электронной почты</label> <input type="hidden" name="Merchant_ID" value="732896"> <input type="hidden" name="OrderCurrency" value="RUB"> <input type="hidden" name="Country" value="RUS"> <input type="hidden" name="State" value="77"> <input type="hidden" name="TestMode" value="0"> <label><input class="oplata_uslug_button" type="Submit" name="Submit" value="Оплатить"></label></form>

<p>Наберите цифру 1 в поле &laquo;Номер заказа&raquo; для благотворительного пожертвования на уставные цели организации 
для поддержки социальных программ и цифру 2 для поддержки конного состава.</p>
<p><strong>Поддержка социальных программ</strong><br/>
▪   Детская группа конного церемониала<br/>
▪   Поддержка работы групп верховой езды для талантливых детей<br/>
▪   Поддержка региональных / всероссийских детских соревнований <br/>
▪   Поддержка внутриклубных детских соревнований <br/>
	▪   Проекты для детей с особыми потребностями (иппотерапия)</p>
<p><strong>Поддержка конного состава:</strong><br/>
▪   Поддержка лошади<br/>
▪   Ветеринария и медицина<br/>
▪   Корма<br/>
▪   Опилки<br/>
▪   Конное снаряжение<br/>
	▪   Средства по уходу</p>
<p><strong>Наши реквизиты:</strong><br/>
Наименование: Автономная некоммерческая организация Конно-спортивный клуб &laquo;Кремлевская школа 
верховой езды&raquo;<br/>
Сокращенное наименование: АНО &laquo;КСК КШВЕ&raquo;<br/>
Адрес: 103986, Москва, ул. Кремль, 9<br/>
ИНН 7704272998 <br/>                              
КПП 770401001<br/>
Р/с 40703810400480000041<br/>
в ОАО &laquo;УРАЛСИБ&raquo; г. Москва<br/>
БИК 044525787<br/>
	К/с 30101810100000000787</p>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>