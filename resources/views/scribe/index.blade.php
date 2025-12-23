<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Habit Tracker API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://hta.lan";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-login">
                                <a href="#authentication-POSTapi-login">Login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-logout">
                                <a href="#authentication-POSTapi-logout">Logout</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-managing-author-tickets" class="tocify-header">
                <li class="tocify-item level-1" data-unique="managing-author-tickets">
                    <a href="#managing-author-tickets">Managing Author-Tickets</a>
                </li>
                                    <ul id="tocify-subheader-managing-author-tickets" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="managing-author-tickets-POSTapi-v1-authors--author_id--tickets">
                                <a href="#managing-author-tickets-POSTapi-v1-authors--author_id--tickets">Create a ticket of author.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-author-tickets-DELETEapi-v1-authors--author_id--tickets--id-">
                                <a href="#managing-author-tickets-DELETEapi-v1-authors--author_id--tickets--id-">Delete a specific ticket of author.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-author-tickets-PUTapi-v1-authors--author--tickets--ticket-">
                                <a href="#managing-author-tickets-PUTapi-v1-authors--author--tickets--ticket-">Replace a specific ticket of author.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-author-tickets-PATCHapi-v1-authors--author--tickets--ticket-">
                                <a href="#managing-author-tickets-PATCHapi-v1-authors--author--tickets--ticket-">Update a specific ticket of author.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-managing-authors" class="tocify-header">
                <li class="tocify-item level-1" data-unique="managing-authors">
                    <a href="#managing-authors">Managing Authors</a>
                </li>
                                    <ul id="tocify-subheader-managing-authors" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="managing-authors-GETapi-v1-authors">
                                <a href="#managing-authors-GETapi-v1-authors">Get paginated authors.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-authors-GETapi-v1-authors--id-">
                                <a href="#managing-authors-GETapi-v1-authors--id-">Show a specific author.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-managing-tickets" class="tocify-header">
                <li class="tocify-item level-1" data-unique="managing-tickets">
                    <a href="#managing-tickets">Managing Tickets</a>
                </li>
                                    <ul id="tocify-subheader-managing-tickets" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="managing-tickets-GETapi-v1-tickets">
                                <a href="#managing-tickets-GETapi-v1-tickets">Get paginated tickets.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-tickets-POSTapi-v1-tickets">
                                <a href="#managing-tickets-POSTapi-v1-tickets">Create a ticket</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-tickets-GETapi-v1-tickets--id-">
                                <a href="#managing-tickets-GETapi-v1-tickets--id-">Show a specific ticket.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-tickets-DELETEapi-v1-tickets--id-">
                                <a href="#managing-tickets-DELETEapi-v1-tickets--id-">Delete a specific ticket.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-tickets-PUTapi-v1-tickets--ticket_id-">
                                <a href="#managing-tickets-PUTapi-v1-tickets--ticket_id-">Replace a specific ticket.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-tickets-PATCHapi-v1-tickets--ticket_id-">
                                <a href="#managing-tickets-PATCHapi-v1-tickets--ticket_id-">Update a specific ticket.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-managing-users" class="tocify-header">
                <li class="tocify-item level-1" data-unique="managing-users">
                    <a href="#managing-users">Managing Users</a>
                </li>
                                    <ul id="tocify-subheader-managing-users" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="managing-users-GETapi-v1-users">
                                <a href="#managing-users-GETapi-v1-users">Get paginated users.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-users-POSTapi-v1-users">
                                <a href="#managing-users-POSTapi-v1-users">Create a user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-users-GETapi-v1-users--id-">
                                <a href="#managing-users-GETapi-v1-users--id-">Show a specific user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-users-DELETEapi-v1-users--id-">
                                <a href="#managing-users-DELETEapi-v1-users--id-">Delete a specific user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-users-PUTapi-v1-users--user_id-">
                                <a href="#managing-users-PUTapi-v1-users--user_id-">Replace a specific user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="managing-users-PATCHapi-v1-users--user_id-">
                                <a href="#managing-users-PATCHapi-v1-users--user_id-">Update a specific user.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: 23.12.2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Habit Tracker allows you to track your habits every single day. You can feed this API to a telegram bot for example.</p>
<aside>
    <strong>Base URL</strong>: <code>http://hta.lan</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

As you scroll, you will see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="authentication">Authentication</h1>

    

                                <h2 id="authentication-POSTapi-login">Login</h2>

<p>
</p>

<p>Authenticates the user and returns the user's API token</p>

<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://hta.lan/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"+-0pBNvYgxwmi\\/#iw\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "+-0pBNvYgxwmi\/#iw"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;token&quot;: &quot;{YOUR_AUTH_KEY}&quot;
    },
    &quot;message&quot;: &quot;Authenticated&quot;,
    &quot;status&quot;: 200
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="+-0pBNvYgxwmi/#iw"
               data-component="body">
    <br>
<p>Must be at least 4 characters. Example: <code>+-0pBNvYgxwmi/#iw</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-logout">Logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Logs out the user and destroys the API token.</p>

<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://hta.lan/api/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Done&quot;,
    &quot;data&quot;: [],
    &quot;status&quot;: 200
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-logout"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="managing-author-tickets">Managing Author-Tickets</h1>

    

                                <h2 id="managing-author-tickets-POSTapi-v1-authors--author_id--tickets">Create a ticket of author.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-authors--author_id--tickets">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://hta.lan/api/v1/authors/architecto/tickets" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"title\": \"architecto\",
            \"description\": \"Eius et animi quos velit et.\",
            \"status\": \"C\"
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/authors/architecto/tickets"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "title": "architecto",
            "description": "Eius et animi quos velit et.",
            "status": "C"
        }
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-authors--author_id--tickets">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-authors--author_id--tickets" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-authors--author_id--tickets"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-authors--author_id--tickets"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-authors--author_id--tickets" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-authors--author_id--tickets">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-authors--author_id--tickets" data-method="POST"
      data-path="api/v1/authors/{author_id}/tickets"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-authors--author_id--tickets', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-authors--author_id--tickets"
                    onclick="tryItOut('POSTapi-v1-authors--author_id--tickets');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-authors--author_id--tickets"
                    onclick="cancelTryOut('POSTapi-v1-authors--author_id--tickets');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-authors--author_id--tickets"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/authors/{author_id}/tickets</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-authors--author_id--tickets"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-authors--author_id--tickets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-authors--author_id--tickets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>author_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="author_id"                data-endpoint="POSTapi-v1-authors--author_id--tickets"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the author. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.title"                data-endpoint="POSTapi-v1-authors--author_id--tickets"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.description"                data-endpoint="POSTapi-v1-authors--author_id--tickets"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.status"                data-endpoint="POSTapi-v1-authors--author_id--tickets"
               value="C"
               data-component="body">
    <br>
<p>Example: <code>C</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>A</code></li> <li><code>C</code></li> <li><code>H</code></li> <li><code>X</code></li></ul>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="managing-author-tickets-DELETEapi-v1-authors--author_id--tickets--id-">Delete a specific ticket of author.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-authors--author_id--tickets--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://hta.lan/api/v1/authors/architecto/tickets/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/authors/architecto/tickets/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-authors--author_id--tickets--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-authors--author_id--tickets--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-authors--author_id--tickets--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-authors--author_id--tickets--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-authors--author_id--tickets--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-authors--author_id--tickets--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-authors--author_id--tickets--id-" data-method="DELETE"
      data-path="api/v1/authors/{author_id}/tickets/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-authors--author_id--tickets--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-authors--author_id--tickets--id-"
                    onclick="tryItOut('DELETEapi-v1-authors--author_id--tickets--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-authors--author_id--tickets--id-"
                    onclick="cancelTryOut('DELETEapi-v1-authors--author_id--tickets--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-authors--author_id--tickets--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/authors/{author_id}/tickets/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-authors--author_id--tickets--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-authors--author_id--tickets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-authors--author_id--tickets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>author_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="author_id"                data-endpoint="DELETEapi-v1-authors--author_id--tickets--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the author. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-v1-authors--author_id--tickets--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the ticket. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="managing-author-tickets-PUTapi-v1-authors--author--tickets--ticket-">Replace a specific ticket of author.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates all fields of the ticket.</p>

<span id="example-requests-PUTapi-v1-authors--author--tickets--ticket-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://hta.lan/api/v1/authors/architecto/tickets/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"title\": \"architecto\",
            \"description\": \"Eius et animi quos velit et.\",
            \"status\": \"A\"
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/authors/architecto/tickets/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "title": "architecto",
            "description": "Eius et animi quos velit et.",
            "status": "A"
        }
    }
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-authors--author--tickets--ticket-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-authors--author--tickets--ticket-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-authors--author--tickets--ticket-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-authors--author--tickets--ticket-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-authors--author--tickets--ticket-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-authors--author--tickets--ticket-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-authors--author--tickets--ticket-" data-method="PUT"
      data-path="api/v1/authors/{author}/tickets/{ticket}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-authors--author--tickets--ticket-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-authors--author--tickets--ticket-"
                    onclick="tryItOut('PUTapi-v1-authors--author--tickets--ticket-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-authors--author--tickets--ticket-"
                    onclick="cancelTryOut('PUTapi-v1-authors--author--tickets--ticket-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-authors--author--tickets--ticket-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/authors/{author}/tickets/{ticket}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-authors--author--tickets--ticket-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-authors--author--tickets--ticket-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-authors--author--tickets--ticket-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>author</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="author"                data-endpoint="PUTapi-v1-authors--author--tickets--ticket-"
               value="architecto"
               data-component="url">
    <br>
<p>The author. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>ticket</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="ticket"                data-endpoint="PUTapi-v1-authors--author--tickets--ticket-"
               value="1"
               data-component="url">
    <br>
<p>The ticket. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.title"                data-endpoint="PUTapi-v1-authors--author--tickets--ticket-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.description"                data-endpoint="PUTapi-v1-authors--author--tickets--ticket-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.status"                data-endpoint="PUTapi-v1-authors--author--tickets--ticket-"
               value="A"
               data-component="body">
    <br>
<p>Example: <code>A</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>A</code></li> <li><code>C</code></li> <li><code>H</code></li> <li><code>X</code></li></ul>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="managing-author-tickets-PATCHapi-v1-authors--author--tickets--ticket-">Update a specific ticket of author.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates any fields of the ticket.</p>

<span id="example-requests-PATCHapi-v1-authors--author--tickets--ticket-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://hta.lan/api/v1/authors/architecto/tickets/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"title\": \"architecto\",
            \"description\": \"Eius et animi quos velit et.\",
            \"status\": \"X\"
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/authors/architecto/tickets/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "title": "architecto",
            "description": "Eius et animi quos velit et.",
            "status": "X"
        }
    }
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-authors--author--tickets--ticket-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-authors--author--tickets--ticket-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-authors--author--tickets--ticket-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-authors--author--tickets--ticket-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-authors--author--tickets--ticket-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-authors--author--tickets--ticket-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-authors--author--tickets--ticket-" data-method="PATCH"
      data-path="api/v1/authors/{author}/tickets/{ticket}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-authors--author--tickets--ticket-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-authors--author--tickets--ticket-"
                    onclick="tryItOut('PATCHapi-v1-authors--author--tickets--ticket-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-authors--author--tickets--ticket-"
                    onclick="cancelTryOut('PATCHapi-v1-authors--author--tickets--ticket-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-authors--author--tickets--ticket-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/authors/{author}/tickets/{ticket}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-v1-authors--author--tickets--ticket-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-authors--author--tickets--ticket-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-authors--author--tickets--ticket-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>author</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="author"                data-endpoint="PATCHapi-v1-authors--author--tickets--ticket-"
               value="architecto"
               data-component="url">
    <br>
<p>The author. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>ticket</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="ticket"                data-endpoint="PATCHapi-v1-authors--author--tickets--ticket-"
               value="1"
               data-component="url">
    <br>
<p>The ticket. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.title"                data-endpoint="PATCHapi-v1-authors--author--tickets--ticket-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.description"                data-endpoint="PATCHapi-v1-authors--author--tickets--ticket-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.status"                data-endpoint="PATCHapi-v1-authors--author--tickets--ticket-"
               value="X"
               data-component="body">
    <br>
<p>Example: <code>X</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>A</code></li> <li><code>C</code></li> <li><code>H</code></li> <li><code>X</code></li></ul>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                <h1 id="managing-authors">Managing Authors</h1>

    

                                <h2 id="managing-authors-GETapi-v1-authors">Get paginated authors.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Displays authors. This means that users who have created at least one ticket.</p>

<span id="example-requests-GETapi-v1-authors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://hta.lan/api/v1/authors" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/authors"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-authors">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 1,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Ms. Alexane Stanton&quot;,
                &quot;email&quot;: &quot;nhilpert@example.net&quot;,
                &quot;isManager&quot;: false,
                &quot;emailVerifiedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailCreatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailUpdateddAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
            }
        },
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 3,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Pedro Bayer&quot;,
                &quot;email&quot;: &quot;pmcclure@example.org&quot;,
                &quot;isManager&quot;: false,
                &quot;emailVerifiedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailCreatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailUpdateddAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/3&quot;
            }
        },
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 4,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Jamir Shanahan&quot;,
                &quot;email&quot;: &quot;senger.seamus@example.com&quot;,
                &quot;isManager&quot;: false,
                &quot;emailVerifiedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailCreatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailUpdateddAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/4&quot;
            }
        },
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 5,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Sadye Aufderhar&quot;,
                &quot;email&quot;: &quot;yohara@example.net&quot;,
                &quot;isManager&quot;: false,
                &quot;emailVerifiedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailCreatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailUpdateddAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/5&quot;
            }
        },
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 6,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Liza Pagac&quot;,
                &quot;email&quot;: &quot;wbode@example.org&quot;,
                &quot;isManager&quot;: false,
                &quot;emailVerifiedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailCreatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;emailUpdateddAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/6&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-authors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-authors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-authors"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-authors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-authors">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-authors" data-method="GET"
      data-path="api/v1/authors"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-authors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-authors"
                    onclick="tryItOut('GETapi-v1-authors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-authors"
                    onclick="cancelTryOut('GETapi-v1-authors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-authors"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/authors</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-authors"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-authors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-authors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="managing-authors-GETapi-v1-authors--id-">Show a specific author.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-authors--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://hta.lan/api/v1/authors/1?include=tickets" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/authors/1"
);

const params = {
    "include": "tickets",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-authors--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;type&quot;: &quot;user&quot;,
        &quot;id&quot;: 1,
        &quot;attributes&quot;: {
            &quot;name&quot;: &quot;Ms. Alexane Stanton&quot;,
            &quot;email&quot;: &quot;nhilpert@example.net&quot;,
            &quot;isManager&quot;: false,
            &quot;emailVerifiedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
            &quot;emailCreatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
            &quot;emailUpdateddAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
        },
        &quot;includes&quot;: [
            [
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 4,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;voluptates&quot;,
                        &quot;description&quot;: &quot;Molestiae possimus quidem consequuntur consequatur dicta veniam. Repudiandae odit corporis voluptatem non. Eaque sint aliquid voluptatem placeat et.&quot;,
                        &quot;status&quot;: &quot;H&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-22T07:04:39.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/4&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 12,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;voluptate&quot;,
                        &quot;description&quot;: &quot;Omnis ut cupiditate voluptas sunt repudiandae. Eos nam necessitatibus repellendus odio iure quaerat quaerat ut. Rem voluptas voluptatem porro laboriosam sequi. Quam excepturi quaerat rerum dolores saepe voluptas molestiae.&quot;,
                        &quot;status&quot;: &quot;A&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/12&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 29,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;nam&quot;,
                        &quot;description&quot;: &quot;Omnis nesciunt sapiente eos eos enim. Qui atque quasi ab eos incidunt id. Sapiente minus est dicta rerum omnis debitis debitis in. Praesentium reprehenderit sequi est eaque.&quot;,
                        &quot;status&quot;: &quot;H&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/29&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 31,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;placeat&quot;,
                        &quot;description&quot;: &quot;Tempora dolorem inventore dolores nesciunt aut. Laudantium sunt officia ut quo magnam. Beatae ut qui qui voluptas assumenda explicabo sint enim. At veritatis vitae quod itaque iure cupiditate qui.&quot;,
                        &quot;status&quot;: &quot;H&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/31&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 34,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;aut&quot;,
                        &quot;description&quot;: &quot;Est voluptatem dolorum dignissimos veniam quas omnis quia. Sit ut laudantium consequuntur qui quod. Explicabo odio iusto ut eius. Eum cupiditate aliquid nesciunt.&quot;,
                        &quot;status&quot;: &quot;A&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/34&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 35,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;id&quot;,
                        &quot;description&quot;: &quot;Excepturi deserunt temporibus ut ea fuga. Enim possimus est natus atque quibusdam enim. Et sit ea dolore ut quia doloremque numquam.&quot;,
                        &quot;status&quot;: &quot;H&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/35&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 40,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;voluptas&quot;,
                        &quot;description&quot;: &quot;Qui nobis est repellendus quidem consectetur. Quod et reiciendis fuga. Nostrum laborum maxime quod odit soluta est. Voluptas eos eos consequatur omnis exercitationem aliquid sit nemo. Repellendus et quia delectus debitis laboriosam et.&quot;,
                        &quot;status&quot;: &quot;A&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/40&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 43,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;sit&quot;,
                        &quot;description&quot;: &quot;Hic eos cum omnis velit ut aut ea. Sit similique animi labore omnis voluptatum. Dignissimos officia quam quam est molestiae sit excepturi.&quot;,
                        &quot;status&quot;: &quot;X&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/43&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 44,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;aut&quot;,
                        &quot;description&quot;: &quot;Eius ipsum veniam est perferendis ab blanditiis voluptatum ipsam. Id non omnis ut dolorum aut. Aut fugit nisi ipsa deleniti necessitatibus ut quae eius. Doloribus nihil quos ducimus ullam ea.&quot;,
                        &quot;status&quot;: &quot;X&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/44&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 46,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;nobis&quot;,
                        &quot;description&quot;: &quot;Quia ut commodi voluptatum nisi quia quod. Aperiam est sed aut consectetur. Dignissimos vel perferendis consequatur repellendus. Sed enim vel ex molestias consequatur soluta quod.&quot;,
                        &quot;status&quot;: &quot;H&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/46&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 47,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;vitae&quot;,
                        &quot;description&quot;: &quot;Porro autem facilis laudantium aut neque ea provident. Dolore sed quod nihil aut voluptatum nihil provident optio. Sunt sapiente voluptatum temporibus similique.&quot;,
                        &quot;status&quot;: &quot;C&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/47&quot;
                    }
                },
                {
                    &quot;type&quot;: &quot;ticket&quot;,
                    &quot;id&quot;: 61,
                    &quot;attributes&quot;: {
                        &quot;title&quot;: &quot;laboriosam&quot;,
                        &quot;description&quot;: &quot;Deserunt libero maxime nobis. Asperiores cumque porro quia ex et beatae.&quot;,
                        &quot;status&quot;: &quot;H&quot;,
                        &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                        &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;author&quot;: {
                            &quot;data&quot;: {
                                &quot;type&quot;: &quot;user&quot;,
                                &quot;id&quot;: 1
                            },
                            &quot;links&quot;: {
                                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                            }
                        }
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/61&quot;
                    }
                }
            ]
        ],
        &quot;links&quot;: {
            &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-authors--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-authors--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-authors--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-authors--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-authors--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-authors--id-" data-method="GET"
      data-path="api/v1/authors/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-authors--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-authors--id-"
                    onclick="tryItOut('GETapi-v1-authors--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-authors--id-"
                    onclick="cancelTryOut('GETapi-v1-authors--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-authors--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/authors/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-authors--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-authors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-authors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-authors--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the author. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>include</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="include"                data-endpoint="GETapi-v1-authors--id-"
               value="tickets"
               data-component="query">
    <br>
<p>Relationship(s) to including. Separate multiple relationships with commas. Not existing relationship will be ignored. Example: <code>tickets</code></p>
            </div>
                </form>

                <h1 id="managing-tickets">Managing Tickets</h1>

    

                                <h2 id="managing-tickets-GETapi-v1-tickets">Get paginated tickets.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-tickets">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://hta.lan/api/v1/tickets?sort=sort%3Dtitle%2C-createdAt&amp;filter%5Btitle%5D=%2Asit%2A" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/tickets"
);

const params = {
    "sort": "sort=title,-createdAt",
    "filter[title]": "*sit*",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-tickets">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 72,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;Custom Ticket 01&quot;,
                &quot;status&quot;: &quot;A&quot;,
                &quot;createdAt&quot;: &quot;2025-12-23T11:30:59.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-23T11:30:59.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 6
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/6&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/72&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 69,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;Custom Ticket 01 by author = 6&quot;,
                &quot;status&quot;: &quot;A&quot;,
                &quot;createdAt&quot;: &quot;2025-12-20T07:42:04.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-20T07:42:04.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 6
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/6&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/69&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 50,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;aut&quot;,
                &quot;status&quot;: &quot;A&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 4
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/4&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/50&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 38,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;consequuntur&quot;,
                &quot;status&quot;: &quot;A&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 6
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/6&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/38&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 49,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;est&quot;,
                &quot;status&quot;: &quot;X&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 5
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/5&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/49&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 48,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;et&quot;,
                &quot;status&quot;: &quot;C&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 4
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/4&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/48&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 47,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;vitae&quot;,
                &quot;status&quot;: &quot;C&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 1
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/47&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 46,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;nobis&quot;,
                &quot;status&quot;: &quot;H&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 1
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/46&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 45,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;sit&quot;,
                &quot;status&quot;: &quot;X&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 5
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/5&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/45&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 40,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;voluptas&quot;,
                &quot;status&quot;: &quot;A&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 1
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/40&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 37,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;omnis&quot;,
                &quot;status&quot;: &quot;C&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 6
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/6&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/37&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 39,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;et&quot;,
                &quot;status&quot;: &quot;C&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 4
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/4&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/39&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 44,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;aut&quot;,
                &quot;status&quot;: &quot;X&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 1
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/44&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 41,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;ducimus&quot;,
                &quot;status&quot;: &quot;C&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 3
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/3&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/41&quot;
            }
        },
        {
            &quot;type&quot;: &quot;ticket&quot;,
            &quot;id&quot;: 43,
            &quot;attributes&quot;: {
                &quot;title&quot;: &quot;sit&quot;,
                &quot;status&quot;: &quot;X&quot;,
                &quot;createdAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;,
                &quot;updatedAt&quot;: &quot;2025-12-19T07:42:29.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;author&quot;: {
                    &quot;data&quot;: {
                        &quot;type&quot;: &quot;user&quot;,
                        &quot;id&quot;: 1
                    },
                    &quot;links&quot;: {
                        &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
                    }
                }
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/43&quot;
            }
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://hta.lan/api/v1/tickets?page=1&quot;,
        &quot;last&quot;: &quot;http://hta.lan/api/v1/tickets?page=4&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://hta.lan/api/v1/tickets?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 4,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://hta.lan/api/v1/tickets?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://hta.lan/api/v1/tickets?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://hta.lan/api/v1/tickets?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;page&quot;: 3,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://hta.lan/api/v1/tickets?page=4&quot;,
                &quot;label&quot;: &quot;4&quot;,
                &quot;page&quot;: 4,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://hta.lan/api/v1/tickets?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://hta.lan/api/v1/tickets&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 15,
        &quot;total&quot;: 53
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-tickets" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-tickets"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-tickets"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-tickets" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-tickets">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-tickets" data-method="GET"
      data-path="api/v1/tickets"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-tickets', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-tickets"
                    onclick="tryItOut('GETapi-v1-tickets');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-tickets"
                    onclick="cancelTryOut('GETapi-v1-tickets');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-tickets"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/tickets</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-tickets"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-tickets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-tickets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-tickets"
               value="sort=title,-createdAt"
               data-component="query">
    <br>
<p>Data field(s) to sort by. Separate multiple fields with commas. Denote descending sort with a minus. Example: <code>sort=title,-createdAt</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[status]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="filter[status]"                data-endpoint="GETapi-v1-tickets"
               value=""
               data-component="query">
    <br>
<p>Filter by status code: A, C, X, H.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[title]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="filter[title]"                data-endpoint="GETapi-v1-tickets"
               value="*sit*"
               data-component="query">
    <br>
<p>Filter by title. Wildcards are supported. Example: <code>*sit*</code></p>
            </div>
                </form>

                    <h2 id="managing-tickets-POSTapi-v1-tickets">Create a ticket</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Creates a new ticket record. Users can only create tickets for themselves.</p>

<span id="example-requests-POSTapi-v1-tickets">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://hta.lan/api/v1/tickets" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"title\": \"architecto\",
            \"description\": \"Eius et animi quos velit et.\",
            \"status\": \"A\"
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/tickets"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "title": "architecto",
            "description": "Eius et animi quos velit et.",
            "status": "A"
        }
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-tickets">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;type&quot;: &quot;ticket&quot;,
        &quot;id&quot;: 72,
        &quot;attributes&quot;: {
            &quot;title&quot;: &quot;Custom Ticket 01&quot;,
            &quot;description&quot;: &quot;Description of Custom Ticket 01&quot;,
            &quot;status&quot;: &quot;A&quot;,
            &quot;createdAt&quot;: &quot;2025-12-23T11:30:59.000000Z&quot;,
            &quot;updatedAt&quot;: &quot;2025-12-23T11:30:59.000000Z&quot;
        },
        &quot;relationships&quot;: {
            &quot;author&quot;: {
                &quot;data&quot;: {
                    &quot;type&quot;: &quot;user&quot;,
                    &quot;id&quot;: 6
                },
                &quot;links&quot;: {
                    &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/6&quot;
                }
            }
        },
        &quot;links&quot;: {
            &quot;self&quot;: &quot;http://hta.lan/api/v1/tickets/72&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-tickets" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-tickets"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-tickets"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-tickets" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-tickets">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-tickets" data-method="POST"
      data-path="api/v1/tickets"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-tickets', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-tickets"
                    onclick="tryItOut('POSTapi-v1-tickets');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-tickets"
                    onclick="cancelTryOut('POSTapi-v1-tickets');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-tickets"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/tickets</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-tickets"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-tickets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-tickets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.title"                data-endpoint="POSTapi-v1-tickets"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.description"                data-endpoint="POSTapi-v1-tickets"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.status"                data-endpoint="POSTapi-v1-tickets"
               value="A"
               data-component="body">
    <br>
<p>Example: <code>A</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>A</code></li> <li><code>C</code></li> <li><code>H</code></li> <li><code>X</code></li></ul>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="managing-tickets-GETapi-v1-tickets--id-">Show a specific ticket.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Display an individual ticket.</p>

<span id="example-requests-GETapi-v1-tickets--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://hta.lan/api/v1/tickets/1?include=author" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/tickets/1"
);

const params = {
    "include": "author",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-tickets--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-tickets--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-tickets--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-tickets--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-tickets--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-tickets--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-tickets--id-" data-method="GET"
      data-path="api/v1/tickets/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-tickets--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-tickets--id-"
                    onclick="tryItOut('GETapi-v1-tickets--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-tickets--id-"
                    onclick="cancelTryOut('GETapi-v1-tickets--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-tickets--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/tickets/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-tickets--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-tickets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-tickets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-tickets--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the ticket. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>include</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="include"                data-endpoint="GETapi-v1-tickets--id-"
               value="author"
               data-component="query">
    <br>
<p>Relationship(s) to including. Separate multiple relationships with commas. Not existing relationship will be ignored. Example: <code>author</code></p>
            </div>
                </form>

                    <h2 id="managing-tickets-DELETEapi-v1-tickets--id-">Delete a specific ticket.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Deletes the ticket.</p>

<span id="example-requests-DELETEapi-v1-tickets--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://hta.lan/api/v1/tickets/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/tickets/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-tickets--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-tickets--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-tickets--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-tickets--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-tickets--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-tickets--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-tickets--id-" data-method="DELETE"
      data-path="api/v1/tickets/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-tickets--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-tickets--id-"
                    onclick="tryItOut('DELETEapi-v1-tickets--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-tickets--id-"
                    onclick="cancelTryOut('DELETEapi-v1-tickets--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-tickets--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/tickets/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-tickets--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-tickets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-tickets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-v1-tickets--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the ticket. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="managing-tickets-PUTapi-v1-tickets--ticket_id-">Replace a specific ticket.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates all fields of the ticket.</p>

<span id="example-requests-PUTapi-v1-tickets--ticket_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://hta.lan/api/v1/tickets/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"title\": \"architecto\",
            \"description\": \"Eius et animi quos velit et.\",
            \"status\": \"A\"
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/tickets/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "title": "architecto",
            "description": "Eius et animi quos velit et.",
            "status": "A"
        }
    }
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-tickets--ticket_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-tickets--ticket_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-tickets--ticket_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-tickets--ticket_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-tickets--ticket_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-tickets--ticket_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-tickets--ticket_id-" data-method="PUT"
      data-path="api/v1/tickets/{ticket_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-tickets--ticket_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-tickets--ticket_id-"
                    onclick="tryItOut('PUTapi-v1-tickets--ticket_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-tickets--ticket_id-"
                    onclick="cancelTryOut('PUTapi-v1-tickets--ticket_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-tickets--ticket_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/tickets/{ticket_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-tickets--ticket_id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-tickets--ticket_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-tickets--ticket_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>ticket_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="ticket_id"                data-endpoint="PUTapi-v1-tickets--ticket_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the ticket. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.title"                data-endpoint="PUTapi-v1-tickets--ticket_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.description"                data-endpoint="PUTapi-v1-tickets--ticket_id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.status"                data-endpoint="PUTapi-v1-tickets--ticket_id-"
               value="A"
               data-component="body">
    <br>
<p>Example: <code>A</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>A</code></li> <li><code>C</code></li> <li><code>H</code></li> <li><code>X</code></li></ul>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="managing-tickets-PATCHapi-v1-tickets--ticket_id-">Update a specific ticket.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates various filds of the ticket.</p>

<span id="example-requests-PATCHapi-v1-tickets--ticket_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://hta.lan/api/v1/tickets/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"title\": \"architecto\",
            \"description\": \"Eius et animi quos velit et.\",
            \"status\": \"A\"
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/tickets/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "title": "architecto",
            "description": "Eius et animi quos velit et.",
            "status": "A"
        }
    }
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-tickets--ticket_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-tickets--ticket_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-tickets--ticket_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-tickets--ticket_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-tickets--ticket_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-tickets--ticket_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-tickets--ticket_id-" data-method="PATCH"
      data-path="api/v1/tickets/{ticket_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-tickets--ticket_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-tickets--ticket_id-"
                    onclick="tryItOut('PATCHapi-v1-tickets--ticket_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-tickets--ticket_id-"
                    onclick="cancelTryOut('PATCHapi-v1-tickets--ticket_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-tickets--ticket_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/tickets/{ticket_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-v1-tickets--ticket_id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-tickets--ticket_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-tickets--ticket_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>ticket_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="ticket_id"                data-endpoint="PATCHapi-v1-tickets--ticket_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the ticket. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.title"                data-endpoint="PATCHapi-v1-tickets--ticket_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.description"                data-endpoint="PATCHapi-v1-tickets--ticket_id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.status"                data-endpoint="PATCHapi-v1-tickets--ticket_id-"
               value="A"
               data-component="body">
    <br>
<p>Example: <code>A</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>A</code></li> <li><code>C</code></li> <li><code>H</code></li> <li><code>X</code></li></ul>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                <h1 id="managing-users">Managing Users</h1>

    

                                <h2 id="managing-users-GETapi-v1-users">Get paginated users.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://hta.lan/api/v1/users" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/users"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 1,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Ms. Alexane Stanton&quot;,
                &quot;email&quot;: &quot;nhilpert@example.net&quot;,
                &quot;isManager&quot;: false
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/1&quot;
            }
        },
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 3,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Pedro Bayer&quot;,
                &quot;email&quot;: &quot;pmcclure@example.org&quot;,
                &quot;isManager&quot;: false
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/3&quot;
            }
        },
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 4,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Jamir Shanahan&quot;,
                &quot;email&quot;: &quot;senger.seamus@example.com&quot;,
                &quot;isManager&quot;: false
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/4&quot;
            }
        },
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 5,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Sadye Aufderhar&quot;,
                &quot;email&quot;: &quot;yohara@example.net&quot;,
                &quot;isManager&quot;: false
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/5&quot;
            }
        },
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 6,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Liza Pagac&quot;,
                &quot;email&quot;: &quot;wbode@example.org&quot;,
                &quot;isManager&quot;: false
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/6&quot;
            }
        },
        {
            &quot;type&quot;: &quot;user&quot;,
            &quot;id&quot;: 7,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;The Manager&quot;,
                &quot;email&quot;: &quot;manager@hta.lan&quot;,
                &quot;isManager&quot;: true
            },
            &quot;includes&quot;: [],
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://hta.lan/api/v1/authors/7&quot;
            }
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://hta.lan/api/v1/users?page=1&quot;,
        &quot;last&quot;: &quot;http://hta.lan/api/v1/users?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://hta.lan/api/v1/users?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://hta.lan/api/v1/users&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 6,
        &quot;total&quot;: 6
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users" data-method="GET"
      data-path="api/v1/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users"
                    onclick="tryItOut('GETapi-v1-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users"
                    onclick="cancelTryOut('GETapi-v1-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-users"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="managing-users-POSTapi-v1-users">Create a user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Creates a new user record.</p>

<span id="example-requests-POSTapi-v1-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://hta.lan/api/v1/users" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"name\": \"architecto\",
            \"email\": \"zbailey@example.net\",
            \"password\": \"|]|{+-\",
            \"isManager\": true
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/users"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "name": "architecto",
            "email": "zbailey@example.net",
            "password": "|]|{+-",
            "isManager": true
        }
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-users" data-method="POST"
      data-path="api/v1/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-users"
                    onclick="tryItOut('POSTapi-v1-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-users"
                    onclick="cancelTryOut('POSTapi-v1-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-users"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.name"                data-endpoint="POSTapi-v1-users"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.email"                data-endpoint="POSTapi-v1-users"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.password"                data-endpoint="POSTapi-v1-users"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>isManager</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-users" style="display: none">
            <input type="radio" name="data.attributes.isManager"
                   value="true"
                   data-endpoint="POSTapi-v1-users"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-users" style="display: none">
            <input type="radio" name="data.attributes.isManager"
                   value="false"
                   data-endpoint="POSTapi-v1-users"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="managing-users-GETapi-v1-users--id-">Show a specific user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Display the individual user.</p>

<span id="example-requests-GETapi-v1-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://hta.lan/api/v1/users/1?include=tickets" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/users/1"
);

const params = {
    "include": "tickets",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users--id-" data-method="GET"
      data-path="api/v1/users/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--id-"
                    onclick="tryItOut('GETapi-v1-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--id-"
                    onclick="cancelTryOut('GETapi-v1-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-users--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-users--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>include</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="include"                data-endpoint="GETapi-v1-users--id-"
               value="tickets"
               data-component="query">
    <br>
<p>Relationship(s) to including. Separate multiple relationships with commas. Not existing relationship will be ignored. Example: <code>tickets</code></p>
            </div>
                </form>

                    <h2 id="managing-users-DELETEapi-v1-users--id-">Delete a specific user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Deletes the user with related tickets.</p>

<span id="example-requests-DELETEapi-v1-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://hta.lan/api/v1/users/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/users/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-users--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-users--id-" data-method="DELETE"
      data-path="api/v1/users/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-users--id-"
                    onclick="tryItOut('DELETEapi-v1-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-users--id-"
                    onclick="cancelTryOut('DELETEapi-v1-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-users--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-v1-users--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="managing-users-PUTapi-v1-users--user_id-">Replace a specific user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates all fields of the user.</p>

<span id="example-requests-PUTapi-v1-users--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://hta.lan/api/v1/users/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"name\": \"architecto\",
            \"email\": \"zbailey@example.net\",
            \"password\": \"|]|{+-\",
            \"isManager\": false
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/users/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "name": "architecto",
            "email": "zbailey@example.net",
            "password": "|]|{+-",
            "isManager": false
        }
    }
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-users--user_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-users--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-users--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-users--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-users--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-users--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-users--user_id-" data-method="PUT"
      data-path="api/v1/users/{user_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-users--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-users--user_id-"
                    onclick="tryItOut('PUTapi-v1-users--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-users--user_id-"
                    onclick="cancelTryOut('PUTapi-v1-users--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-users--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/users/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-users--user_id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="PUTapi-v1-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.name"                data-endpoint="PUTapi-v1-users--user_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.email"                data-endpoint="PUTapi-v1-users--user_id-"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.password"                data-endpoint="PUTapi-v1-users--user_id-"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>isManager</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-users--user_id-" style="display: none">
            <input type="radio" name="data.attributes.isManager"
                   value="true"
                   data-endpoint="PUTapi-v1-users--user_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-users--user_id-" style="display: none">
            <input type="radio" name="data.attributes.isManager"
                   value="false"
                   data-endpoint="PUTapi-v1-users--user_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="managing-users-PATCHapi-v1-users--user_id-">Update a specific user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Updates various filds of the user.</p>

<span id="example-requests-PATCHapi-v1-users--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://hta.lan/api/v1/users/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"name\": \"architecto\",
            \"email\": \"zbailey@example.net\",
            \"password\": \"|]|{+-\",
            \"isManager\": true
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://hta.lan/api/v1/users/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "name": "architecto",
            "email": "zbailey@example.net",
            "password": "|]|{+-",
            "isManager": true
        }
    }
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-users--user_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-users--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-users--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-users--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-users--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-users--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-users--user_id-" data-method="PATCH"
      data-path="api/v1/users/{user_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-users--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-users--user_id-"
                    onclick="tryItOut('PATCHapi-v1-users--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-users--user_id-"
                    onclick="cancelTryOut('PATCHapi-v1-users--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-users--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/users/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-v1-users--user_id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="PATCHapi-v1-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.name"                data-endpoint="PATCHapi-v1-users--user_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.email"                data-endpoint="PATCHapi-v1-users--user_id-"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.password"                data-endpoint="PATCHapi-v1-users--user_id-"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>isManager</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PATCHapi-v1-users--user_id-" style="display: none">
            <input type="radio" name="data.attributes.isManager"
                   value="true"
                   data-endpoint="PATCHapi-v1-users--user_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PATCHapi-v1-users--user_id-" style="display: none">
            <input type="radio" name="data.attributes.isManager"
                   value="false"
                   data-endpoint="PATCHapi-v1-users--user_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
