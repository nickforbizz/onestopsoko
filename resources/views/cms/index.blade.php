@extends('layouts.cms')

@section('content')


<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
				<h5 class="text-white op-7 mb-2">System view at a glance</h5>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				<a href="{{ url('supplies') }}" class="btn btn-white btn-border btn-round mr-2">Add Supply</a>
				<a href="{{ url('sales') }}" class="btn btn-secondary btn-round">Add Sale</a>
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-6">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">Overall statistics</div>
					<div class="card-category">Daily information about statistics in system</div>
					<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
						<div class="px-2 pb-2 pb-md-0 text-center">
							<div id="circles-1"></div>
							<h6 class="fw-bold mt-3 mb-0">Today's Sales</h6>
						</div>
						<div class="px-2 pb-2 pb-md-0 text-center">
							<div id="circles-2"></div>
							<h6 class="fw-bold mt-3 mb-0">Weekly's Sales</h6>
						</div>
						<div class="px-2 pb-2 pb-md-0 text-center">
							<div id="circles-3"></div>
							<h6 class="fw-bold mt-3 mb-0">Monthly's Sales</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">Weekly Sales & Daily Sales statistics</div>
					<div class="row py-3">
						<div class="col-md-4 d-flex flex-column justify-content-around">
							<div>
								<h6 class="fw-bold text-uppercase text-success op-8">Weekly Sales</h6>
								<h3 class="fw-bold"> Ksh {{ $weeklySales }} </h3>
							</div>
							<div>
								<h6 class="fw-bold text-uppercase text-danger op-8">Today's Sale</h6>
								<h3 class="fw-bold">Ksh {{ $dailySales }}</h3>
							</div>
						</div>
						<div class="col-md-8">
							<div id="chart-container">
								<canvas id="totalIncomeChart"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">General Statistics</div>
						<div class="card-tools">
							<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
								<span class="btn-label">
									<i class="fa fa-pencil"></i>
								</span>
								Export
							</a>
							<a href="#" class="btn btn-info btn-border btn-round btn-sm">
								<span class="btn-label">
									<i class="fa fa-print"></i>
								</span>
								Print
							</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="chart-container" style="min-height: 375px">
						<canvas id="statisticsChart"></canvas>
					</div>
					<div id="myChartLegend"></div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card card-primary">
				<div class="card-header">
					<div class="card-title">Daily Sales</div>
					<div class="card-category"> {{ \Carbon\Carbon::today()->toDateString() }}</div>
				</div>
				<div class="card-body pb-0">
					<div class="mb-2 mt-2">
						<h1>Ksh {{ $dailySales }} </h1>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body pb-0">
					<div class="h1 fw-bold float-right text-warning">+7%</div>
					<h2 class="mb-2">Ksh {{ $weeklySales }}</h2>
					<p class="text-muted">Weekly Sales</p>
					<div class="pull-in sparkline-fix">
						<div id="lineChart"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Top Products</div>
				</div>
				<div class="card-body pb-0">
					@forelse($topProductsSold as $product_sold)
					<div class="d-flex">
						<div class="avatar">
							<img src="../assets/img/products/{{ $product_sold->product->photo }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="flex-1 pt-1 ml-2">
							<h6 class="fw-bold mb-1">{{ $product_sold->product->title }}</h6>
							<small class="text-muted">{{ $product_sold->product->product_category->name }}</small>
						</div>
						<div class="d-flex ml-auto align-items-center">
							<h3 class="text-info fw-bold"> Ksh {{ $product_sold->total_amount }} /=</h3>
						</div>
					</div>
					<div class="separator-dashed"></div>
					@empty
					<p>No records found</p>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
	Circles.create({
		id: 'circles-1',
		radius: 45,
		value: 19,
		maxValue: 100,
		width: 7,
		text: '{!! $dailySales_quantity !!}',
		colors: ['#f1f1f1', '#FF9E27'],
		duration: 400,
		wrpClass: 'circles-wrp',
		textClass: 'circles-text',
		styleWrapper: true,
		styleText: true
	})

	Circles.create({
		id: 'circles-2',
		radius: 45,
		value: 70,
		maxValue: 100,
		width: 7,
		text: '{!! $weeklySales_quantity !!}',
		colors: ['#f1f1f1', '#2BB930'],
		duration: 400,
		wrpClass: 'circles-wrp',
		textClass: 'circles-text',
		styleWrapper: true,
		styleText: true
	})

	Circles.create({
		id: 'circles-3',
		radius: 45,
		value: 40,
		maxValue: 100,
		width: 7,
		text: '{!! $monthlySales_quantity !!}',
		colors: ['#f1f1f1', '#F25961'],
		duration: 400,
		wrpClass: 'circles-wrp',
		textClass: 'circles-text',
		styleWrapper: true,
		styleText: true
	})

	var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');
	let weekly_sales = {!!$lastWeekTrends!!};
	let monthly_sales = {!!$lastMonthTrends!!};
	const totalSalesArray = weekly_sales.map(item => Number(item.total_sales));
	const totalmonthlySales = monthly_sales.map(item => Number(item.total_sales));
	
	let monthly_supplies = {!!$lastMonthSupplies!!};
	const totalmonthlySupplies = monthly_supplies.map(item => Number(item.total_sales));

	var mytotalIncomeChart = new Chart(totalIncomeChart, {
		type: 'bar',
		data: {
			labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
			datasets: [{
				label: "Weekly Sales Trends",
				backgroundColor: '#ff9e27',
				borderColor: 'rgb(23, 125, 255)',
				data: totalSalesArray,
			}],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false,
			},
			scales: {
				yAxes: [{
					ticks: {
						display: false //this will remove only the label
					},
					gridLines: {
						drawBorder: false,
						display: false
					}
				}],
				xAxes: [{
					gridLines: {
						drawBorder: false,
						display: false
					}
				}]
			},
		}
	});



	$('#lineChart').sparkline(totalSalesArray, {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#ffa534',
		fillColor: 'rgba(255, 165, 52, .14)'
	});



	//Chart

	var ctx = document.getElementById('statisticsChart').getContext('2d');

	var statisticsChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: "Sales",
				borderColor: '#f3545d',
				pointBackgroundColor: 'rgba(243, 84, 93, 0.6)',
				pointRadius: 0,
				backgroundColor: 'rgba(243, 84, 93, 0.4)',
				legendColor: '#f3545d',
				fill: true,
				borderWidth: 2,
				data: totalmonthlySales
			}, {
				label: "Supplies",
				borderColor: '#fdaf4b',
				pointBackgroundColor: 'rgba(253, 175, 75, 0.6)',
				pointRadius: 0,
				backgroundColor: 'rgba(253, 175, 75, 0.4)',
				legendColor: '#fdaf4b',
				fill: true,
				borderWidth: 2,
				data: totalmonthlySupplies
			}, {
				label: "Active Users",
				borderColor: '#177dff',
				pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
				pointRadius: 0,
				backgroundColor: 'rgba(23, 125, 255, 0.4)',
				legendColor: '#177dff',
				fill: true,
				borderWidth: 2,
				data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900]
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			tooltips: {
				bodySpacing: 4,
				mode: "nearest",
				intersect: 0,
				position: "nearest",
				xPadding: 10,
				yPadding: 10,
				caretPadding: 10
			},
			layout: {
				padding: {
					left: 5,
					right: 5,
					top: 15,
					bottom: 15
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						fontStyle: "500",
						beginAtZero: false,
						maxTicksLimit: 5,
						padding: 10
					},
					gridLines: {
						drawTicks: false,
						display: false
					}
				}],
				xAxes: [{
					gridLines: {
						zeroLineColor: "transparent"
					},
					ticks: {
						padding: 10,
						fontStyle: "500"
					}
				}]
			},
			legendCallback: function(chart) {
				var text = [];
				text.push('<ul class="' + chart.id + '-legend html-legend">');
				for (var i = 0; i < chart.data.datasets.length; i++) {
					text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>');
					if (chart.data.datasets[i].label) {
						text.push(chart.data.datasets[i].label);
					}
					text.push('</li>');
				}
				text.push('</ul>');
				return text.join('');
			}
		}
	});

	var myLegendContainer = document.getElementById("myChartLegend");

	// generate HTML legend
	myLegendContainer.innerHTML = statisticsChart.generateLegend();

	// bind onClick event to all LI-tags of the legend
	var legendItems = myLegendContainer.getElementsByTagName('li');
	for (var i = 0; i < legendItems.length; i += 1) {
		legendItems[i].addEventListener("click", legendClickCallback, false);
	}
</script>
@endpush