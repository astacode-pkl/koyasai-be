<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Koyasai RESTful Api Documentation</title>
        <!-- Import Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        />
        <style>
            pre {
                background: #f8f9fa;
                padding: 10px;
                border: 1px solid #dee2e6;
                border-radius: 0.25rem;
                overflow-x: auto;
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <h1 class="mb-4">Koyasai RESTful Api Documentation</h1>

            <!-- Bagian Ringkasan Endpoint -->
            <div class="mb-5">
                <h2 class="mt-4 mb-2">API Endpoints Overview</h2>

                <h3><a href="#catalog" class="text-decoration-none" style="color: inherit; text-decoration: none;">Catalog API</a></h3>
                <ul>
                    <li>
                        <code><span style="color: #007bff;"><span style="color: #007bff;">GET</span></span> /api/catalog</code> →
                        <strong>Retrieve all catalogs</strong>
                    </li>
                </ul>

                <h3><a href="#companyprofile" class="text-decoration-none" style="color: inherit; text-decoration: none;">Company Profile API</a></h3>
                <ul>
                    <li>
                        <code><span style="color: #007bff;"><span style="color: #007bff;">GET</span></span> /api/companyprofile</code> →
                        <strong>Retrieve all company profile</strong>
                    </li>
                </ul>

                <h3><a href="#contact" class="text-decoration-none" style="color: inherit; text-decoration: none;">Contact API</a></h3>
                <ul>
                    <li>
                        <code><span style="color: #007bff;"><span style="color: #FF4500">POST</span></span> /api/contact</code> →
                        <strong>Sent Message</strong>
                    </li>
                </ul>

                <h3><a href="#client" class="text-decoration-none" style="color: inherit; text-decoration: none;">Client API</a></h3>
                <ul>
                    <li>
                        <code><span style="color: #007bff;"><span style="color: #007bff;">GET</span></span> /api/client</code> →
                        <strong>Retrieve all client records</strong>
                    </li>
                </ul>

                <h3><a href="#embed" class="text-decoration-none" style="color: inherit; text-decoration: none;">Embed API</a></h3>
                <ul>
                    <li>
                        <code><span style="color: #007bff;"><span style="color: #007bff;">GET</span></span> /api/embed</code> →
                        <strong>Retrieve embedded content</strong>
                    </li>
                </ul>

                <h3><a href="#gallery" class="text-decoration-none" style="color: inherit; text-decoration: none;">Gallery API</a></h3>
                <ul>
                    <li>
                        <code><span style="color: #007bff;"><span style="color: #007bff;">GET</span></span> /api/gallery</code> →
                        <strong>Retrieve all images from the gallery</strong>
                    </li>
                </ul>

                <h3><a href="#hero" class="text-decoration-none" style="color: inherit; text-decoration: none;">Hero API</a></h3>
                <ul>
                    <li>
                        <code><span style="color: #007bff;"><span style="color: #007bff;">GET</span></span> /api/hero</code> →
                        <strong>Retrieve hero section details</strong>
                    </li>
                </ul>

                <h3><a href="#news" class="text-decoration-none" style="color: inherit; text-decoration: none;">News API</a></h3>
                <ul>
                    <li>
                        <code><span style="color: #007bff;"><span style="color: #007bff;">GET</span></span> /api/news</code> →
                        <strong>Retrieve latest news articles</strong>
                    </li>
                </ul>
            </div>

            <hr />

            <h2 class="mb-4">API Endpoints</h2>

            <!-- Card Catalog API -->
            <div class="card mb-4" id="catalog">
                <div class="card-header">
                    <h3>Catalog API</h3>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Endpoint:</strong> <code><span style="color: #007bff;"><span style="color: #007bff;">GET</span></span> /api/catalog</code>
                    </p>
                    <p>
                        <strong>URL:</strong>
                        <a href="{{ url('/api/catalog') }}"
                            >{{ url('/api/catalog') }}</a
                        >
                    </p>
                    <p>
                        <strong>Description:</strong> Fetch all available catalog data.
                    </p>
                    <h5 class="mt-4">Example Response:</h5>
                    <pre>
{
  "status": 200,
  "catalog": [
    {
      "id": 1
    }
  ]
}
                    </pre>
                    <p><strong>Response Code:</strong></p>
                    <ul>
                        <li>200 OK – Data retrieved successfully</li>
                        <li>404 Not Found – Data not found</li>
                        <li>500 Internal Server Error – Server error</li>
                    </ul>
                </div>
            </div>

            <!-- Card Company Profile API -->
            <div class="card mb-4" id="companyprofile">
                <div class="card-header">
                    <h3>Company Profile API</h3>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Endpoint:</strong>
                        <code><span style="color: #007bff;"><span style="color: #007bff;">GET</span></span> /api/companyprofile</code>
                    </p>
                    <p>
                        <strong>URL:</strong>
                        <a href="{{ url('/api/companyprofile') }}"
                            >{{ url('/api/companyprofile') }}</a
                        >
                    </p>
                    <p>
                        <strong>Description:</strong> Fetch all company profile data.
                    </p>
                    <h5 class="mt-4">Example Response:</h5>
                    <pre>
{
  "status": 200,
  "companyprofile": [
    {
      "id": 1,
      "logo": "",
      "name": "",
      "email": "",
      "address": "",
      "history": "",
      "simple_history": "",
      "instagram": "",
      "facebook": "",
      "youtube": "",
      "whatsapp": "",
      "phone": "",
      "map": "",
      "created_at": "",
      "updated_at": "",
      "image": ""
    }
  ]
}
                    </pre>
                    <p><strong>Response Code:</strong></p>
                    <ul>
                        <li>200 OK – Data retrieved successfully</li>
                        <li>404 Not Found – Data not found</li>
                        <li>500 Internal Server Error – Server error</li>
                    </ul>
                </div>
            </div>

            <!-- Card Company Profile API -->
            <div class="card mb-4" id="Contact">
                <div class="card-header">
                    <h3>Contact API</h3>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Endpoint:</strong>
                        <code><span style="color: #007bff;"><span style="color: #FF4500;">POST</span></span> /api/contact</code>
                    </p>
                    <p>
                        <strong>URL:</strong>
                        <a href="{{ url('/api/contact') }}"
                            >{{ url('/api/contact') }}</a
                        >
                    </p>
                    <p>
                        <strong>Description:</strong> Post message to admin inbox.
                    </p>
                    <h5 class="mt-4">Example Response:</h5>
                    <pre>
{
    "status": 200,
    "message": "Contact has been sent",
    "contact": {
        "name": "ujang",
        "email": "ujang@mail.test",
        "subject": "Test",
        "message": "Halooooo",
        "updated_at": "2025-02-25T05:44:55.000000Z",
        "created_at": "2025-02-25T05:44:55.000000Z",
        "id": 1
    }
}
                    </pre>
                    <p><strong>Response Code:</strong></p>
                    <ul>
                        <li>201 Created – Message has been sent successfully</li>
                        <li>422 Unprocessable Entity – Invalid input provided</li>
                        <li>500 Internal Server Error – Server error</li>
                    </ul>
                </div>
            </div>

            <!-- Card Client API -->
            <div class="card mb-4" id="client">
                <div class="card-header">
                    <h3>Client API</h3>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Endpoint:</strong> <code><span style="color: #007bff;">GET</span> /api/client</code>
                    </p>
                    <p>
                        <strong>URL:</strong>
                        <a href="{{ url('/api/client') }}"
                            >{{ url('/api/client') }}</a
                        >
                    </p>
                    <p><strong>Description:</strong> Fetch all client data.</p>
                    <h5 class="mt-4">Example Response:</h5>
                    <pre>
{
  "status": 200,
  "clients": [
      {
        "id": 1,
        "name": "Client 1",
        "image": "client1.jpg",
        "image_url": "http://127.0.0.1:8000/images/clients/client1.jpg"
      },
      {
        "id": 2,
        "name": "Client 2",
        "image": "client2.jpg",
        "image_url": "http://127.0.0.1:8000/images/clients/client2.jpg"
      }
  ]
}
                    </pre>
                    <p><strong>Response Code:</strong></p>
                    <ul>
                        <li>200 OK – Data retrieved successfully</li>
                        <li>404 Not Found – Data not found</li>
                        <li>500 Internal Server Error – Server error</li>
                    </ul>
                </div>
            </div>

            <!-- Card Embed API -->
            <div class="card mb-4" id="embed">
                <div class="card-header">
                    <h3>Embed API</h3>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Endpoint:</strong> <code><span style="color: #007bff;">GET</span> /api/embed</code>
                    </p>
                    <p>
                        <strong>URL:</strong>
                        <a href="{{ url('/api/embed') }}"
                            >{{ url('/api/embed') }}</a
                        >
                    </p>
                    <p>
                        <strong>Description:</strong> Fetch all embedded data.
                    </p>
                    <h5 class="mt-4">Example Response:</h5>
                    <pre>
{
  "status": 200,
  "embed": [
      {
        "id": 1,
        "content": "&lt;iframe src='https://example.com'&gt;&lt;/iframe&gt;"
      },
      {
        "id": 2,
        "content": "&lt;iframe src='https://example.com'&gt;&lt;/iframe&gt;"
      }
  ]
}
                    </pre>
                    <p><strong>Response Code:</strong></p>
                    <ul>
                        <li>200 OK – Data retrieved successfully</li>
                        <li>404 Not Found – Data not found</li>
                        <li>500 Internal Server Error – Server error</li>
                    </ul>
                </div>
            </div>

            <!-- Card Gallery API -->
            <div class="card mb-4" id="gallery">
                <div class="card-header">
                    <h3>Gallery API</h3>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Endpoint:</strong> <code><span style="color: #007bff;">GET</span> /api/gallery</code>
                    </p>
                    <p>
                        <strong>URL:</strong>
                        <a href="{{ url('/api/gallery') }}"
                            >{{ url('/api/gallery') }}</a
                        >
                    </p>
                    <p>
                        <strong>Description:</strong> Fetch all images from the gallery.
                    </p>
                    <h5 class="mt-4">Example Response:</h5>
                    <pre>
{
  "status": 200,
  "gallery": [
      {
        "id": 1,
        "images": "image.webp",
        "images_url": "http://127.0.0.1:8000/images/galleries/image.webp"
      },
      {
        "id": 2,
        "images": "image.webp",
        "images_url": "http://127.0.0.1:8000/images/galleries/image.webp"
      }
  ]
}
                    </pre>
                    <p><strong>Response Code:</strong></p>
                    <ul>
                        <li>200 OK – Data retrieved successfully</li>
                        <li>404 Not Found – Data not found</li>
                        <li>500 Internal Server Error – Server error</li>
                    </ul>
                </div>
            </div>

            <!-- Card Hero API -->
            <div class="card mb-4" id="hero">
                <div class="card-header">
                    <h3>Hero API</h3>
                </div>
                <div class="card-body">
                    <p><strong>Endpoint:</strong> <code><span style="color: #007bff;">GET</span> /api/hero</code></p>
                    <p>
                        <strong>URL:</strong>
                        <a href="{{ url('/api/hero') }}"
                            >{{ url('/api/hero') }}</a
                        >
                    </p>
                    <p>
                        <strong>Description:</strong> Fetch all hero section data for homepage.
                    </p>
                    <h5 class="mt-4">Example Response:</h5>
                    <pre>
{
  "status": 200,
  "hero": [
      {
        "id": 1
      },
      {
        "id": 2
      }
  ]
}
                    </pre>
                    <p><strong>Response Code:</strong></p>
                    <ul>
                        <li>200 OK – Data retrieved successfully</li>
                        <li>404 Not Found – Data not found</li>
                        <li>500 Internal Server Error – Server error</li>
                    </ul>
                </div>
            </div>

            <!-- Card News API -->
            <div class="card mb-4" id="news">
                <div class="card-header">
                    <h3>News API</h3>
                </div>
                <div class="card-body">
                    <p><strong>Endpoint:</strong> <code><span style="color: #007bff;">GET</span> /api/news</code></p>
                    <p>
                        <strong>URL:</strong>
                        <a href="http://koyasai-be.test/api/news"
                            >http://koyasai-be.test/api/news</a
                        >
                    </p>
                    <p>
                        <strong>Description:</strong> Fetch all news articles data.
                    </p>
                    <h5 class="mt-4">Example Response:</h5>
                    <pre>
{
  "status": 200,
  "news": [
      {
        "id": 1
      },
      {
        "id": 2
      }
  ]
}
                    </pre>
                    <p><strong>Response Code:</strong></p>
                    <ul>
                        <li>200 OK – Data retrieved successfully</li>
                        <li>404 Not Found – Data not found</li>
                        <li>500 Internal Server Error – Server error</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS dan dependensinya -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
