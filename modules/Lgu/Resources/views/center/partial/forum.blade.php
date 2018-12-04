<h4> {{ $channel->name }} Forum</h4>
<div class="box box-success">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
            <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
            <!-- chat item -->
            <div class="item">
                <img src="{{asset('images/photo-blank.jpeg')}}" alt="user image" class="online">

                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                        Mike Doe
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
                <div class="attachment">
                    <h4>Attachments:</h4>

                    <p class="filename">
                        Theme-thumbnail-image.jpg
                    </p>

                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                    </div>
                </div>
                <!-- /.attachment -->
            </div>
            <!-- /.item -->
            <!-- chat item -->
            <div class="item">
                <img src="{{asset('images/photo-blank.jpeg')}}" alt="user image" class="offline">

                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                        Alexander Pierce
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
            </div>
            <!-- /.item -->
            <!-- chat item -->
            <div class="item">
                <img src="{{asset('images/photo-blank.jpeg')}}" alt="user image" class="offline">
                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                        Susan Doe
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
            </div>
            <!-- /.item -->
        </div>
        <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px;"></div>
        <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
        </div>
    <!-- /.chat -->
    <div class="box-footer">
        <div class="input-group">
            <input class="form-control" placeholder="Type message...">

            <div class="input-group-btn">
                <button type="button" class="btn btn-success"><i class="fa fa-send"></i>&nbsp;&nbsp;Send</button>
            </div>
        </div>
    </div>
</div>
