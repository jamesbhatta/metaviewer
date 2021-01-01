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
    </div>

    <script>
        var apiUrl = 'http://localhost:8000/api/metas'
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
