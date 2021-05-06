<?php include("header.php"); ?>

<div class="container-fluid p-5">
  <div class="row">
    <div class="col-8">
      <div class="posts">
        <h2>Posts</h2>
        <article>
          <div class="row all_posts">
            <div class="col-12">
              <span><i class="fa fa-spinner fa-spin"></i> Loading Posts </span>
            </div>
            <!-- <div class="col-12 my-3">
              <header class="entry-header">
                <h2 class="entry-title">
                </h2>
                <h2><a href="index.php?id=13">Technology!</a></h2>
                <div class="entry-meta">
                  <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"> 06-10-17 03:59:26</li>
                    <li class="list-group-item"><a href="#" title="" rel="category tag">In </a><a href="category.php?id=9">
                        <font color="green">Technology</font>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="entry-content my-4">
                  <p>All of the biggest technological inventions created by man - the airplane, the automobile, the computer - says little about his intelligence, but speaks volumes about his laziness. - Mark Kennedy</p>
                </div>
                <hr>
              </header>
            </div> -->
          </div>
        </article>
      </div>
    </div>
    <div class="col-4">
      <aside>
        <div class="categories">
          <h2>Categories</h2>
          <div class="row all_categories">
            <div class="col-12">
              <span><i class="fa fa-spinner fa-spin"></i> Loading Categories </span>
            </div>
            <!-- <div class="col-12">
              <h4><a href="javascript:void(0)">Programming</a></h4>
            </div>
            <div class="col-12">
              <h4><a href="javascript:void(0)">Technology</a></h4>
            </div> -->
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    /* Fetch Posts */
    const fetchPosts = () => {
      const formData = {
        controller: "Posts",
        action: "index",
        _token: "<?= $_SESSION['_token'] ?>"
      }

      $.ajax({
        type: 'post',
        url: 'routes.php',
        data: formData,
      }).done(function(res) {
        const response = JSON.parse(res).map((r) => {
          const string = `<div class="col-12 my-3">
              <header class="entry-header">
                <h2 class="entry-title">
                ${r.title}
                </h2>
                <div class="entry-meta">
                  <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">${r.date_posted}</li>
                    <li class="list-group-item"><a href="#" title="" rel="category tag">In </a><a href="category.php?id=${r.category_id}">
                        <font color="green">${r.category_name}</font>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="entry-content my-4">
                  <p>${r.contents}</p>
                </div>
                <hr>
              </header>
            </div>`
          return string
        })
        $(".all_posts").html(response.join(""))
      }).fail(function() {
        alert("Request Failed. Please refresh the page")
      })

    }

    const fetchCategories = () => {
      const formData = {
        controller: "Categories",
        action: "index",
        _token: "<?= $_SESSION['_token'] ?>"
      }
      $.ajax({
          type: 'post',
          url: 'routes.php',
          data: formData
        }).done((res) => {
          const response = JSON.parse(res).map((r) => {
            const string = `<div class="col-12">
              <h4><a href="javascript:void(0)">${r.name}</a></h4>
            </div>`
            return string
          })
          $(".all_categories").html(response.join(""))
        })
        .fail((err) => {
          alert("Request Failed. Please refresh the page")
        })
    }
    fetchCategories()
    fetchPosts()
  });
</script>
<?php include("footer.php"); ?>