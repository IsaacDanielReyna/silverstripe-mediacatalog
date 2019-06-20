<div class="container">
    <div class="row">
        <div class="col">
            <% with $Media %>
            <div class="media">
                    $Image
                    <div class="media-body">
                            
                        <h5 class="mt-0">$Title</h5>
                        $Stars
                        <div class="rating-container" style="width:100px; background:purple;">
                            <div class="rating-percentage" style="background:red; width:$Stars%; height:50px"></div>
                        </div>
                        <p><strong>$NativeTitle</strong> $Transliteration</p>
                        $Description
                    </div>
                </div>
            <% end_with %>
        </div>
    </div>
</div>


