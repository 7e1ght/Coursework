<link href="../../styles/admin_content.less" rel="stylesheet/less" type="text/css" /><script type="text/javascript" src="../../scripts/less.min.js"></script>

<script src="../../scripts/admin_authcontent.js"></script>
<script src="../../scripts/admin_tabs_handler.js"></script>
<script src="../../scripts/admin_table_handler.js"></script>

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
				<div class="but" id="insert">Вставить</div>
			</div>
			<div class="but_container athe_buts">
				<div class="but" id="save">Сохранить изменения</div>
			</div>
		</div>
	</div>
</div>