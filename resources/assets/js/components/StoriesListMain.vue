<template>
 <div class="container-fluid">

    <div class="row">
    <div class="col-12 col-md-6">
    <header class="section-header">
        <h3 class="section-title">Stories</h3>  
    </header> 
    </div> 
    <div class="col-12 col-md-6">
    <div class="form-group justify-content-center">
           <div class="input-group">         
                <input class="search-text form-control col-12 col-md-8" type="text" placeholder="What are you looking for?" v-model="query">
                  <span class="input-group-btn">
                      <button class="btn btn-primary btn-story" type="button" v-on:click="search()" v-if="!loading">Search!</button>
                    <button class="btn btn-primary btn-story" type="button" disabled="disabled" v-if="loading">Searching...</button>
                  </span>
            </div> <!-- input-group -->
            <div class="alert alert-danger" role="alert" v-if="error">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    @{{ error }}
                </div>
            </div>  <!-- form-group --> 
    </div> 

            <div id="stories" class="row">
                    <div class="story-item-container" v-bind:class="[selectedItem === story ? 'is-expanded' : 'is-collapsed', ''] " v-for="story in stories">
                            <div class="row">
                                <div class="col-6">   
                            <a class="scrollto" v-bind:href="'#story' + story.id" v-on:click="expand(story)">                                                                                                               
                                <img class="img-fluid thumb-image" :src="'storage/' + story.thumbnail_1" />
                                </a>
                                </div>
                                <div class="col-6">   
                            <a class="scrollto" v-bind:href="'#story' + story.id" v-on:click="expand(story)">                                                      
                                    <p class="caption" v-html="story.content"></p> <p class="read-more"> ... </p>
                            </a>           
                                </div>
                                </a>
                                </div> <!-- row -->
                                <!-- <p class="align-center"> <a v-bind:href="'#story' + story.id" class="click-for-more-detail"><i class="glyphicon description-arrow glyphicon-menu-down" style="width:100%;"></i> </a></p> -->

                        <!-- detail information -->

                        <div v-bind:id="'story' + story.id" class="story-des-container">
                            <!-- row -->
                            <div class="story-des-content">
                                <header class="section-header">
                                    <h3 class="section-title">My Happiness Blog</h3>   
                                    <span><a class="des-close-button" v-on:click="collapse()"></a> </span>   
                                </header>
                                <div class="row">
                                    <div class="col-12 col-md-6" >
                                        <div class="row">
                                            <div class="col-12 col-md-4"> <img class="img-fluid" :src="'storage/' + story.image_1" /> </div>                                   
                                            <div class="col-12 col-md-4"> <img class="img-fluid" :src="'storage/' + story.image_2" />   </div>                                 
                                            <div class="col-12 col-md-4"> <img class="img-fluid" :src="'storage/' + story.image_3" /></div>                                    
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <h4 class="title"><strong> {{story.title}}</strong></h4>

                                    <span class="rating"> Rating : </span>
                                    <span class="fa fa-star" v-bind:class="{ checked: story.ratings>0 }"></span>
                                    <span class="fa fa-star" v-bind:class="{ checked: story.ratings>1 }"></span>
                                    <span class="fa fa-star" v-bind:class="{ checked: story.ratings>2 }"></span>
                                    <span class="fa fa-star" v-bind:class="{ checked: story.ratings>3 }"></span>
                                    <span class="fa fa-star" v-bind:class="{ checked: story.ratings>4 }"></span>

                                    <p class="description" v-html="story.content"></p>
                                    </div>
                                </div> <!-- ./row -->
                            </div> <!-- ./story-des-container -->
                        </div> <!-- story-item-container -->
            </div> <!-- stories -->
        </div>
        
</template>

<script>
    export default {
        mounted() {
            this.search();
        },
        data: function() { return {
            stories : [],
            loading: false,
            error: false,
            query: '',
            isCollapsed: true,
            selectedItem: null,

        }
    },

        methods: {
    search: function() {
        this.error = '';
        this.stories = [];
        this.loading = true;
            axios.get('/api/search/stories?query=' + this.query).then((response) => {
                response.data.error ? this.error = response.data.error : this.stories = response.data;
                this.loading = false;
            });
            },
    expand: function(story) {
        if (this.selectedItem === story) this.selectedItem = null
        else this.selectedItem = story

        },
    collapse: function() {
        console.log('colapsed clicked');
        this.selectedItem = null;
        }
    }
    }
</script>
