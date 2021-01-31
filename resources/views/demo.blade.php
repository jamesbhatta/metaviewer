<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="//unpkg.com/@highlightjs/cdn-assets@10.5.0/styles/default.min.css">
    <script src="//unpkg.com/@highlightjs/cdn-assets@10.5.0/highlight.min.js"></script>
    <script>
        // hljs = document.getElementsByClassName('hljs');
        hljs.initHighlightingOnLoad();

    </script>
    <style>
        /*
        Atom One Dark by Daniel Gamage
        Original One Dark Syntax theme from https://github.com/atom/one-dark-syntax
        base:    #282c34
        mono-1:  #abb2bf
        mono-2:  #818896
        mono-3:  #5c6370
        hue-1:   #56b6c2
        hue-2:   #61aeee
        hue-3:   #c678dd
        hue-4:   #98c379
        hue-5:   #e06c75
        hue-5-2: #be5046
        hue-6:   #d19a66
        hue-6-2: #e6c07b
        */

        .hljs {
            display: block;
            overflow-x: auto;
            padding: 0.5em;
            color: #abb2bf;
            background: #282c34;
        }

        .hljs-comment,
        .hljs-quote {
            color: #5c6370;
            font-style: italic;
        }

        .hljs-doctag,
        .hljs-keyword,
        .hljs-formula {
            color: #c678dd;
        }

        .hljs-section,
        .hljs-name,
        .hljs-selector-tag,
        .hljs-deletion,
        .hljs-subst {
            color: #e06c75;
        }

        .hljs-literal {
            color: #56b6c2;
        }

        .hljs-string,
        .hljs-regexp,
        .hljs-addition,
        .hljs-attribute,
        .hljs-meta-string {
            color: #98c379;
        }

        .hljs-built_in,
        .hljs-class .hljs-title {
            color: #e6c07b;
        }

        .hljs-attr,
        .hljs-variable,
        .hljs-template-variable,
        .hljs-type,
        .hljs-selector-class,
        .hljs-selector-attr,
        .hljs-selector-pseudo,
        .hljs-number {
            color: #d19a66;
        }

        .hljs-symbol,
        .hljs-bullet,
        .hljs-link,
        .hljs-meta,
        .hljs-selector-id,
        .hljs-title {
            color: #61aeee;
        }

        .hljs-emphasis {
            font-style: italic;
        }

        .hljs-strong {
            font-weight: bold;
        }

        .hljs-link {
            text-decoration: underline;
        }

    </style>
    <style>
        code {
            white-space: pre;
        }

    </style>
</head>
<body>

    <div class="container py-5 bg-light">
        <div class="text-center">
            <input id="url" type="text" class="form-control" placeholder="insert url">
            <button id="btn" class="btn btn-primary mt-4">Get Data</button>
        </div>

        <pre class="d-block">
            <code id="response" class="language-html hljs">
                { }
            </code>
        </pre>

        <div class="d-flex border border-2 rounded-3 overflow-hidden" style="background-color: #f1f1f1;">
            <div class="ratio ratio-4x3" style="max-width: 200px;">
                <img class="rounded-start" src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png" alt="">
            </div>
            <div class="py-3 px-3">
                <h5 class="text-dark mt-0 mb-1">List-based media object</h5>
                <p class="text-muted">
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    <a class="d-block text-muted font-monospace mt-2" href="" style="text-decoration: none;">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                <path d="M4.715 6.542L3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.001 1.001 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 0 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 0 0-4.243-4.243L6.586 4.672z" />
                            </svg>
                        </span>
                        <span>youtube.com</span>
                    </a>
                </p>
            </div>
        </div>

    </div>

    <script>
        var apiUrl = '{{ url('/') }}/api/metas'
        document.getElementById("btn").addEventListener("click", function() {
            let url = document.getElementById("url").value;
            console.log(url);
            axios.get(apiUrl, {
                    params: {
                        url: url
                    }
                })
                .then(function(response) {
                    console.log(typeof(response.data));
                    document.getElementById("response").innerHTML = JSON.stringify(response.data, null, 4);
                    hljs.highlightBlock(document.getElementById("response"));
                });
        });

    </script>
</body>
</html>
