<form $FormAttributes>
    <% if $Message %>
        <p id="{$FormName}_error" class="message $MessageType">$Message</p>
    <% else %>
        <p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
    <% end_if %>
    
    <% if SuccessMessage %>
	$SuccessMessage
    <% end_if %>
    
    <fieldset>

        <div id="Name" class="field name">
            <label class="left" for="{$FormName}_Name">Name</label>
            $Fields.dataFieldByName(Name)
            <% if $Fields.dataFieldByName(Name).Message %>            
            <span id="{$FormName}_error" class="message $Fields.dataFieldByName(Name).MessageType">
                $Fields.dataFieldByName(Name).Message
            </span>
            <% end_if %>
        </div>
    
        <div id="Email" class="field email">
            <label class="left" for="{$FormName}_Email">Email</label>
            $Fields.dataFieldByName(Email)
            <% if $Fields.dataFieldByName(Email).Message %>            
            <span id="{$FormName}_error" class="message $Fields.dataFieldByName(Email).MessageType">
                $Fields.dataFieldByName(Email).Message
            </span>
            <% end_if %>
        </div>
         
        <div id="Comment" class="field password">
            <label class="left" for="{$FormName}_Comments">Comments</label>
            <% with $Fields.dataFieldByName(Comment) %>
                $field
                <% if $Message %>
                    <span id="{$FormName}_error" class="message $MessageType">$Message</span>
                <% end_if %>
            <% end_with %>
        </div>
         
        $Fields.dataFieldByName(SecurityID)
    </fieldset>
     
    <% if $Actions %>
    <div class="Actions">
        <% loop $Actions %>$Field<% end_loop %>
    </div>
    <% end_if %>
</form>