<template>
<div>
    <div class="row">
        <div class="form-group col-md-4 col col-md-offset-2">
              <div class="input-group input-group-md">
                  <div class="icon-addon addon-md">
                      <input type="text" placeholder="What are you looking for?" class="form-control" v-model="query">
                  </div>
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="button" @click="search()" v-if="!loading">Search!</button>
                    <button class="btn btn-default" type="button" disabled="disabled" v-if="loading">Searching...</button>
                  </span>
            </div> <!-- input-group -->
            <div class="alert alert-danger" role="alert" v-if="error">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    @{{ error }}
                </div>
            </div>  <!-- form-group -->  
    </div> 
            <div id="stories" class="row list-group">
                    <div class="item col-xs-4 col-lg-4" v-for="story in stories">
                            <div class="thumbnail">
                                <img class="group list-group-image" :src="'storage/' + story.thumbnail_1" />
                                <div class="caption">
                                    <p class="group inner list-group-item-text" v-html="story.content"></p>            
                                </div>
                                <div>
                                    <a v-bind:href="'stories/' + story.id"  class="btn btn-small btn-success" > Show </a>
                                    <a v-bind:href="'stories/' + story.id + '/edit'" class="btn btn-small btn-success" > Edit </a>
                                </div>
                            </div> <!-- thumbnail -->
                    </div>
            </div> <!-- stories -->
        </div>
        
</template>

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
            query: ''
        }
    },

        methods: {
    search: function() {
        this.error = '';
        this.stories = [];
        this.loading = true;
            axios.get('/api/search/allstories?query=' + this.query).then((response) => {
                response.data.error ? this.error = response.data.error : this.stories = response.data;
                this.loading = false;
                this.query = '';
            });
            }
        }
    }
</script>
