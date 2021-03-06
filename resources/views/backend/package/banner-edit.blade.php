    <!-- banner section start -->
    <div class="float-right">
        <div class="btn-group">
            <button type="button" class="btn btn-primary add-more-banner-btn">
                Add a banner
            </button>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="banners__wrapper">
        @php
        if(!empty($packageData->banner_images) && !empty(unserialize($packageData->banner_images))){

        //sort banner images by order
        $banner_imageData = unserialize($packageData->banner_images);
        usort($banner_imageData, function ($a, $b) {
        return $a['order'] - $b['order'];
        });

        $count = count($banner_imageData);

        foreach($banner_imageData as $key => $image){
        $datatoggle = "collapse";
        $areaexpanded = "false";
        $class = "collapse";

        if (1 == $count) {
        $datatoggle = "collapse";
        $areaexpanded = "true";
        $class = "collapse show";
        }
        @endphp

        <div class="banners">
            <div class="bannersh4 addmoreh4">
                <h4 data-toggle="{{$datatoggle}}" data-target="#bcontainer{{$key}}" aria-expanded="{{$areaexpanded}}">Banner {{$count}}</h4>
                <?php
                $imageName = $image['image'];
                $shortUrl = 'admin/package/' . $packageData->id . '/' . 'deleteBannerImage?image=' . $image['image'];
                ?>
                <a href="{{url($shortUrl)}}" class="close remove-banner removeitem" onclick="return ajaxDeleteItem(event, this);">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div id="bcontainer{{$key}}" class="{{$class}}">
                <div class="form-group row">
                    <label for="title" class="col-lg-2 col-form-label">Banner Title</label>
                    <div class="col-lg-10">
                        <input type="text" name="banner_title[]" class="form-control" value="{{$image['title']}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Banner Text</label>
                    <div class="col-lg-10 ">
                        <textarea name="banner_description[]" class="form-control" rows="5">{{$image['description']}}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Display Order</label>
                    <div class="col-lg-10">
                        <input type="number" name="banner_position[]" class="form-control" value="{{$image['order']}}" min="1">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Image</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="bimage{{$key}}action" data-input="bimage{{$key}}" data-preview="bimage{{$key}}holder" class="filemanager btn btn-info w-200 text-white">
                                    Choose <i class="far fa-image text-white"></i>
                                </a>
                            </span>
                            <input type="text" class="form-control" id="bimage{{$key}}" name="banner_image[]" value="{{$image['image']}}" />
                        </div>
                        <p>Recommended : width=1903px and height=600px</p>

                        @if(!empty($image['image']))
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{asset($image['image'])}}" class="img-fluid max-h-300" id="bimage{{$key}}holder">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Image Alt</label>
                    <div class="col-lg-10">
                        <input type="text" name="banner_image_alt[]" class="form-control" value="{{$image['image_alt']}}">
                    </div>
                </div>
                <hr>
            </div>
        </div>
        @php
        $count = $count - 1;
        }
        }else{
        @endphp
        <div class="banners first-banner">
            <div class="bannersh4 addmoreh4">
                <h4 data-toggle="collapse" data-target="#bcontainer0" aria-expanded="true">Banner 1</h4>
            </div>
            <div id="bcontainer0">
                <div class="form-group row">
                    <label for="title" class="col-lg-2 col-form-label"> Banner Title</label>
                    <div class="col-lg-10">
                        <input type="text" name="banner_title[]" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Banner Text</label>
                    <div class="col-lg-10">
                        <textarea name="banner_description[]" class="form-control texteditor" id="bannertexteditor0" rows="5"></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Display Order</label>
                    <div class="col-lg-10">
                        <input type="number" name="banner_position[]" class="form-control" min="1">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Image</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="bannerImage0" data-input="bimage0" data-preview="bimage0holder" class="filemanager btn btn-info w-200 text-white">
                                    Choose <i class="far fa-image text-white"></i>
                                </a>
                            </span>
                            <input type="text" class="form-control" id="bimage0" name="banner_image[]" min="1"/>
                        </div>
                        <p>Recommended : width=1903px and height=600px</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <img class="img-fluid max-h-300" id="bimage0holder">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Image Alt</label>
                    <div class="col-lg-10">
                        <input type="text" name="banner_image_alt[]" class="form-control">
                    </div>
                </div>
                <hr>
            </div>
        </div>

        @php
        }
        @endphp
    </div>
    <!-- banner section end -->