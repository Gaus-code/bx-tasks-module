<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

?>
<section class="details wrapper">
	<div class="details__container">
		<div class="detail__card_header">
			<h3 class="detail__card_title">Title</h3>
			<div class="card__fav">
				<img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/star.svg" alt="add to favourite">
			</div>
		</div>
		<div class="detail__card_content">
			<p class="detail__card_text">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at beatae commodi cupiditate dignissimos, distinctio doloribus eligendi eos expedita facilis maiores, maxime, molestiae mollitia neque nisi non nostrum obcaecati optio pariatur placeat quidem sed totam. Accusamus, accusantium aliquid aspernatur assumenda aut commodi cupiditate dolores enim eveniet facere facilis harum labore laudantium magnam molestiae natus nemo, nihil nisi non nulla, odit omnis repellat reprehenderit tenetur voluptatibus? Ab ad assumenda at consectetur cupiditate delectus dignissimos dolore, esse est excepturi expedita fugit id magnam modi mollitia nobis nostrum numquam odio officiis pariatur, possimus provident quae quaerat quia quibusdam quod repudiandae saepe tempora temporibus unde ut, vel veritatis voluptatem. Accusantium architecto doloremque dolorum et harum nemo nobis officiis quasi totam voluptas! Ea, eos esse eveniet expedita id natus nostrum recusandae! Consectetur eos hic itaque iusto, nesciunt odio quaerat rem suscipit. Aliquam amet animi asperiores, atque culpa cum cumque deserunt distinctio doloremque eius enim eveniet facere fuga id iste itaque maiores molestias natus non numquam officiis quaerat quod recusandae, rem repellat repudiandae saepe, sequi sit soluta tempore. Ab aut cumque dicta dolorem fugit illo molestiae natus nemo non officiis, quibusdam recusandae saepe soluta sunt voluptates! A cupiditate explicabo iure iusto laboriosam laudantium ut vel. Amet provident, recusandae. Culpa debitis doloremque doloribus labore quis? Aliquam consequatur doloribus harum iure neque non nostrum sapiente sed. Aliquam consectetur dolor illo in nemo quo veritatis voluptas. Autem ducimus ea eveniet laboriosam minima, odio optio perferendis praesentium provident quaerat quam, quidem veritatis vitae! Commodi ea expedita maiores nulla, obcaecati veritatis.
			</p>
		</div>
	</div>
	<div class="details__meta">
		<div class="detail__card_priority">
			<p class="priority">Priority: <span style="background-color: #C91433">In Progress</span></p>
		</div>
		<div class="detail__card_footer">
			<div class="detail__card_lastActivity">Last Activity: 20 Mar 20:50</div>
			<div class="detail__card_showDetails">Deadline: 20 Mar 20:50</div>
		</div>
		<div class="details__meta_actions">
			<a href="/tasks/125/edit/" id="openEdit" class="editBtn" type="button">Edit</a>
			<button class="remove">
				<img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/bin.svg" alt="remove task">
			</button>
		</div>
	</div>
</section>
