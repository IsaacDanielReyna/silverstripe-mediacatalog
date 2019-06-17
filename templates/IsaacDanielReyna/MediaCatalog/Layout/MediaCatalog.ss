<div class="container">
    <div class="row">
        <div class="col">
            <h1>Media Catalog</h1>
            $Content
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Type</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <% loop $Media %>
                    <tr>
                        <td>$Image.Fit(32,32)</td>
                        <td>$Type.Name</td>
                        <td><a href="$Link">$Title</a></td>
                        <td>$Description</td>
                        <td>$Rating</td>
                    </tr>
                    <% end_loop %>
                </tbody>
            </table>
        </div>
    </div>
</div>