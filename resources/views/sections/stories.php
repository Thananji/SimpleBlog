<div class="container-fluid">

 <header class="section-header">
        <div class="form-group col-md-6 col-12 col col-md-offset-2 justify-content-center">
           <div class="input-group">
           <h3 class="section-title col-12 col-md-4">Stories</h3>          
                <input class="search-text form-control col-12 col-md-8" type="text" placeholder="What are you looking for?" v-model="query">
                  <span class="input-group-btn">
                      <button class="btn btn-primary" type="button" v-on:click="search()" v-if="!loading">Search!</button>
                    <button class="btn btn-primary" type="button" disabled="disabled" v-if="loading">Searching...</button>
                  </span>
            </div> <!-- input-group -->
            <div class="alert alert-danger" role="alert" v-if="error">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    @{{ error }}
                </div>
            </div>  <!-- form-group --> 
</header>

            <div id="stories" class="row">
                    <div v-for="story in stories">
                    <div class="story-item-container" v-bind:class="{'is-collapsed': isCollapsed, 'is-expanded': !isCollapsed }">
                            <div class="row">
                            <a v-bind:href="'#story' + story.id" v-on:click="expand()">
                                <div class="col-6">                            
                                <img class="img-fluid" :src="'storage/' + story.thumbnail_1" />
                                </div>
                                <div class="col-6">                                
                                    <p class="caption" v-html="story.content"></p>            
                                </div>
                                </a>
                                </div> <!-- row -->
                                <!-- <p class="align-center"> <a v-bind:href="'#story' + story.id" class="click-for-more-detail"><i class="glyphicon description-arrow glyphicon-menu-down" style="width:100%;"></i> </a></p> -->


                        <!-- detail information -->

                        <div class="story-des-container">
                            <!-- row -->
                            <div class=" story-des-content">
                                <header class="section-header">
                                    <h3 class="section-title">My Happiness Blog</h3>   
                                    <span><a class="des-close-button" v-on:click="collapse()"></a> </span>   
                                </header>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <img class="img-fluid" :src="'storage/' + story.image_1" />                                    
                                    </div>
                                    <div class="col-12 col-md-6">

                                    <h2>Star Rating</h2>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>

                                    <p class="description" v-html="story.content"></p>
                                    </div>
                                </div> <!-- ./row -->
                            </div> <!-- ./story-des-container -->
                        </div> <!-- story-item-container -->
                        </div>
            </div> <!-- stories -->
        </div>
 
        <script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.search();
        },
        data: function() { return {
            stories : [],
            loading: false,
            error: false,
            query: '',
            isCollapsed: true
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
    expand: function() {
        this.isCollapsed = false;
        },
    collapse: function() {
        this.isCollapsed = true;
        }
    }
    }
</script>
