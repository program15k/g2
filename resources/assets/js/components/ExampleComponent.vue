<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
        
						
						<p>Csrf token to : {{csrf}}</p>
						data to : {{testujemy}}
						<br>
						{{ month }} - miesiac <br>
						{{ year }} - rok
						<br>
						<button v-on:click="daysInMonth">sprawdziloscdni</button>
						{{ iloscdni }}
						
						 <br> <span v-for="n in iloscdni">{{ n }}<br> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
     export default {
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			testujemy: "test",
			month: 7,
			year: 2009,
			iloscdni:null
          }), 
	methods:{
		test: function(month, year){
		alert('Hello ' + this.niedzialakur + '!')
		
		},
		daysInMonth(month, year) {
     this.iloscdni = (new Date(this.year, this.month, 0).getDate());
}
    },
	 created(){

    },

	
	
	
	}
</script>
