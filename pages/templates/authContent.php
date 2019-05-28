<link href="../../styles/admin_content.less" rel="stylesheet/less" type="text/css" /><script type="text/javascript" src="../../scripts/less.min.js"></script>

<script src="../../scripts/admin_authcontent.js"></script>
<script src="../../scripts/admin_tabs_handler.js"></script>
<script src="../../scripts/admin_table_handler.js"></script>
<script src="../../scripts/print.js"></script>

<div class="content_wrapper">
	<div class="content"> 
		<div id="tabs">
			<div id="tab_names">
				<div class="tab_name inactive_tab_name" id="tab_name_1">Клиенты</div>
				<div class="tab_name inactive_tab_name" id="tab_name_2">Туры</div>
				<div class="tab_name inactive_tab_name" id="tab_name_3">Города</div>
				<div class="tab_name inactive_tab_name" id="tab_name_4">Страны</div>
				<div class="tab_name inactive_tab_name" id="tab_name_5">Транспорт</div>
			</div>
			<div id="tab_contents">
				<div class="tab_content" id="tab_content_1">
					<?php 
						require_once 'scripts/admin_functions.php';
						get_table(1);
					?>
				</div>
				<div class="tab_content" id="tab_content_2"></div>
				<div class="tab_content" id="tab_content_3"></div>
				<div class="tab_content" id="tab_content_4"></div>
				<div class="tab_content" id="tab_content_5"></div>
			</div>
		</div> 
		<div class="buttons">
			<div class="but_container modify_buts">
				<div class="but" id="delete">Удалить</div>
				<div class="but" id="save">Сохранить изменения</div>
				<div class="but" id="insert">Вставить</div>
			</div>

			<div class="but_container print_buts">
<!-- 				<div class="but print_but" id="tour_income">Доход по турам</div>
				<div class="but print_but" id="list_tour_clients">Список туров по клиентам </div>
				<div class="but print_but" id="tour_duration">Продолжительность туров</div>
				<div class="but print_but" id="list_tour_month_year">Список туров за каждый месяц каждого года</div> -->
				
				<form action="../../print_page.php" method="post" target='_blank'>
					<input class="but print_but" type="submit" value="Доход по турам" name="tour_income">
					<input class="but print_but" type="submit" value="Список туров по клиентам" name="list_tour_clients">
					<input class="but print_but" type="submit" value="Продолжительность туров" name="tour_duration">
					<input class="but print_but" type="submit" value="Список туров за каждый месяц каждого года" name="list_tour_month_year">
				</form>

			</div>
		</div>
	</div>
</div>