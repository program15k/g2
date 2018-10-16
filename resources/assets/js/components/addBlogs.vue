<template>
  <div id="add-blog">
<h1>Dodaj nową rozerwację</h1>
 <form>
     <label>Imię</label>
    <input type="text" v-model.lazy="blog.name" required /><br>
	<label>Nazwisko</label>
    <input type="text" v-model.lazy="blog.lastname" required /><br>
    <label>Email</label>
    <input type="email" v-model.lazy="blog.email" required /><br>
	<label>Numer telefonu</label>
    <input type="number" v-model.lazy="blog.phone" required /><br>
    <label> Dodatkowa notatka:</label>
    <textarea v-model.lazy="blog.content"></textarea>
    <div id="checkboxes">
        <label>Ninjas</label>
        <input type="checkbox" value="ninjas" v-model="blog.categories"/>
        <label>Wizards</label>
        <input type="checkbox" value="wizards" v-model="blog.categories"/>
        <label>Mario</label>
        <input type="checkbox" value="mario" v-model="blog.categories"/>
        <label>Cheese</label>
        <input type="checkbox" value="cheese" v-model="blog.categories"/>
    </div>
    <select v-model="blog.author">
        <option v-for="author in authors">{{ author }}</option>
    </select>
    <button v-on:click.prevent="sendData">Odbierz posta</button>
	<button v-on:click.prevent="post">Wyślij formularz</button>
 </form>
 <div v-if="submitted">
     <h3>Thanks for adding your post</h3>
 </div>
 
 <div id="preview">
     <h3>Podejrzyj rezerwację</h3>
     <p>Imie:{{ blog.name }}</p>
     <p>Nazwisko: {{ blog.lastname }}</p>
	 <p>Mail: {{ blog.mail }}</p>
	 <p>Telefon: {{ blog.phone }}</p>
	 <p>Data rezerwacji {{ blog.resData }}</p>
	 
	 
	 <br><br><br>
     <ul>
         <li v-for="category in blog.categories">{{category}}</li>
     </ul>
     <p>Author: {{ blog.author }}</p>
	<p> Twój token to : {{csrf}}</p>
	
	<p> Niżej powinno coś być :/ </p>
	<p> ODPOWIEDZ POSTA </p>
	
		<p> {{ tags }} </p>
		


	
	<div v-for="(tag, index) in tags" class="single-blog">
       <article class="success" v-if="tag == 1" v-on:click="actualdata = tag; calendarClick"> {{index}}  - tag - {{ tag }} - Wolny</article>
	   <article  class="secondary" v-else-if="tag == 2" v-on:click="actualdata = tag; calendarClick">{{index}}  - tag - {{ tag }} -Rezerwacja bez potwierdzenia</article>
	   <article  class="info" v-else-if="tag == 3" v-on:click="actualdata = tag; calendarClick">{{index}}  - tag - {{ tag }} - Rezerwacja potwierdzona</article>
	   <article v-else v-on:click="calendarClick">Coś poszło nie tak w dniu {{index}} tag to - {{ tag }} </article>
    </div>
	
	<div style="clear:both;"></div>
	
hehe {{
	

	
	<p> Ilosc dni to {{ iloscdni }} </p>
	<p> Rok - {{ year }}</p>
	<p> Miesiąc - {{ month }} </p>
	<p> Ilość dni w tym miesiącu - {{ iloscdni }} </p>
	<p> Pierwszy dzień w tym miesiącu to: - {{ firstday }} </p>
	<p> {{responses}}</p>
	
	
	<div v-for="response in responses" class="single-blog">
		<p> {{ response.mon_this}} </p>
    </div>
	

	
 </div>
  </div>
</template>

<script>
    export default {
        components: {

        },
        data() {
            return {
                blog: {
                    name: "",
					lastname: "",
					phone: "",
					email: "",
					content: "",
					resData: "",
                },
                authors: ['Autor 1', 'Autor2', 'Autor3'],
                submitted: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                responses: [],
				iloscdni:null,
				year:2009,
				month:7,
				tags: [],
				firstday:null,
                actualdata:null

				
            }
        },
        methods: {
            post: function() {
                this.$http.post('http://192.168.0.102/g2/public/oddo', {
                    emulateJSON: true,
                    _token: this.csrf,
                    name: this.blog.name,
					lastname: this.blog.lastname,
					phone: this.blog.phone,
					email: this.blog.email,
					resData: this.blog.resData,
					content: "",
					

                }).then(response => {
                 
					
                });
            },
			sendData: function() {
			        this.$http.post('http://192.168.0.102/g2/public/oddo', {
                    emulateJSON: true,
                    _token: this.csrf,
                    Imie: "Janusz"
			 }).then(response => {
                    this.responses = [response.body];
					this.iloscdni = (new Date(this.year, this.month, 0).getDate());
					this.tags = response.body.mon_this
					this.firstday = (new Date(this.year + "-" + this.month + "-01").getDay());
					this.blogs = [data.body];
					
                });
			
			},
			calendarClick: function (event) {
      alert("test");	  	  
}
        },
		
    }

</script>

<style scoped>
    h1 {
        text-align: center;
    }

    form {
        width: 100%;
        max-width: 960px;
        margin: 0 auto;
    }

    #useful-links ul {
        padding: 0;
    }

    #useful-links li {
        display: inline-block;
        margin-right: 10px;
    }

    form>div {
        padding: 20px;
        background: #eee;
        margin: 20px;
    }

    #form-header {
        background: #ddd;
        border: 1px solid #bbb;
    }
	
	article{
	background-color:red;
	width: 100%;
	height: 100%;
	}
	
	.single-blog {
    padding: 5px;
    margin: 5px;
    display: block;
    width: 100px;
    float: left;
	height:100px;
	cursor:pointer;
}

	.success{
	background-color:green;
	}
	
	.secondary{
	background-color:gray;
	}
	
	.info{
	background-color:teal;
	}

</style>
