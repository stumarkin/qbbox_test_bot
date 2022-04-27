<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>[кьюби]</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	<script defer src="https://telegram.org/js/telegram-web-app.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
</head>
<body>
	<main class="container">
		<div id="app">
			<div class="step1" v-show="step==1" >
				<div class="h3 m-2">Что вы хотите хранить?</div>
				<div class="small m-2">Отметьте вещи, и мы покажем, сколько будут стоить хранение и доставка. Если платеж в месяц получится больше 5000₽, вам полагается скидка 50% на всю часть платежа свыше этой суммы</div>
				
				<div class="accordion accordion-flush" id="accordionFlushExample">
					<div v-for="(stuff, stuffIndex) in stuffs" class="accordion-item">
						<h2 class="accordion-header" :id="'flush-heading-' + stuffIndex">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#flush-collapse-' + stuffIndex" aria-expanded="true" :aria-controls="'#flush-collapse-' + stuffIndex">
							{{ stuff.name }} 							
							<span v-if="stuff.subtotal" class="text-secondary small ms-4">{{stuff.subtotal}}₽</span>
								
							</button>
						</h2>
						<div :id="'flush-collapse-' + stuffIndex" class="accordion-collapse collapse" :aria-labelledby="'flush-heading-' + stuffIndex" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body">
								
								<template v-for="(item, itemIndex) in stuff.items">
									<div v-if="item.isCategory">
										<div class="h6">{{item.name}}</div>
										<template v-for="(subitem, subitemIndex) in item.items">
											<div class="form-check mb-2">
												<div class="row">
													<div class="col-9">
														<input class="form-check-input" type="checkbox" :id="'flexCheck'+stuffIndex+subitemIndex" v-model="subitem.isChecked">
														<label class="form-check-label" :for="'flexCheck'+stuffIndex+subitemIndex">
															{{subitem.name}} 
															<span class="text-secondary small">{{subitem.price}}₽</span>
														</label>
													</div>
													<div class="col-3">
														<select v-show="(subitem.isChecked && subitem.isMultiple)" v-model="subitem.count" class="form-select form-select-sm border-0" aria-label="Default select example">
															<option v-for="i in 10" :value="i">{{i}}</option>
														</select>
													</div>
												</div>
											</div>
										</template>
	
									</div>
									<div v-else class="form-check mb-2">
										<div class="row">
											<div class="col-9">
												<input class="form-check-input" type="checkbox" :id="'flexCheck'+stuffIndex+itemIndex" v-model="item.isChecked">
												<label class="form-check-label" :for="'flexCheck'+stuffIndex+itemIndex">
													{{item.name}} 
													<span class="text-secondary small">{{item.price}}₽</span>
												</label>
											</div>
											<div class="col-3">
												<select v-show="(item.isChecked && item.isMultiple)" v-model="item.count" class="form-select form-select-sm border-0" aria-label="Default select example">
													<option v-for="i in 10" :value="i">{{i}}</option>
												</select>
											</div>
											<div v-if="item.hint" class="col-12 text-secondary" style="font-size: 10px">{{item.hint}} </div>
										</div>
									</div>
									
								</template>
								
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="h3 m-2 mt-4">Выберете период хранения</div>
				<div class="text-center m-2">
					<div class="btn-group-vertical w-100" role="group" aria-label="Basic radio toggle button group">
						<template v-for="(periodItem, periodIndex) in periods">
							<input type="radio" class="btn-check" name="btnradio" :id="'btnradio-'+periodIndex" autocomplete="off" v-model="period" :value="periodIndex" :checked="period==periodIndex" >
							<label class="btn btn-outline-secondary" :for="'btnradio-'+periodIndex">
								{{periodItem.name}}
								<span v-if="periodItem.discount" class="badge bg-success">-{{periodItem.discount}}%</span>
							</label>
						</template>
					</div>
				</div>
	
	
	
				<div v-show="totalMonthPrice" class="log small text-center my-4">
					Стоимость месяца хранения <span :class="(periods[period].discount ? 'text-decoration-line-through' : '')">{{ totalMonthPrice }}₽</span>
					<div v-if="periods[period].discount">Стоимость месяца хранения со скидкой <span class="text-success">{{ totalMonthPrice * (100 - periods[period].discount) / 100 }}₽</span></div>
				</div>
			</div>


			<div class="step2"  v-show="step==2">
				<div class="h3 m-2">Оформить хранение вещей</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Как с вами связаться</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="+7" disabled>
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Когда вам удобно сдать вещи</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="25.04.2022" disabled>
				</div>
				
				<div class="alert alert-warning" role="alert">
					<p>
						Это прототип бота для расчета стоимости хранения и оформления заявки. Здесь пока не оформляются настоящие заказы и не производится настоящий расчет.
					</p>
					<p>
						Если вы заинтересованы во внедрении такого бота, напишите <a href="https://t.me/stumarkin">@stumarkin</a>
					</p>
				</div>

			</div>
		</div>
	</main>
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script defer src="js/index.js?<?=time()?>"></script>
</body>
</html>
