<div class="container">
    <div class="row">
        <div class="col">
            <h1>Media Catalog</h1>
            $Content
        </div>
    </div>

    <div class="row">
        <div class="col">
            <% loop $Catalog %>
            <ul>
                <li>$Image</li>
                <li>$Transliteration $NativeTitle $Title</li>
                <li>$Description</li>
                <li>$LastUpdate</li>
                <li>$Rating</li>
            </ul>
            <% end_loop %>
        </div>
    </div>
</div>