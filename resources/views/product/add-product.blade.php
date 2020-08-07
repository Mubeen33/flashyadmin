@include('layouts/header')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Add New Product</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ url('/add-product') }}">Add New Product</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Contextual colors -->
                <section id="contextual-colors" class="card overflow-hidden">
                    <div class="card-header">
                        <h4 class="card-title">Add Product Pictures</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
								<div class="row">
									<div class="col-sm-8">
										<div class="row">
											<div class="col-sm-6 text-center">
												<div class="col-12 primary-image">
													<i class="feather icon-camera f28"></i>
													<p class="use-web-link">
														<strong>Upload Primary Image</strong>
														<br />
														<small>Or <a href="javascript:void(0)">use link from web</a></small>
													</p>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="row">
													<div class="col-6 text-center pl-0 mb-1">
														<div class="col-12 thumb">
															<i class="feather icon-camera f28"></i>
															<p class="use-web-link">
																<strong>Upload Image 2</strong>
																<br />
																<small>Or <a href="javascript:void(0)">use link from web</a></small>
															</p>
														</div>
													</div>
													<div class="col-6 text-center pl-0 mb-1">
														<div class="col-12 thumb">
															<i class="feather icon-camera f28"></i>
															<p class="use-web-link">
																<strong>Upload Image 3</strong>
																<br />
																<small>Or <a href="javascript:void(0)">use link from web</a></small>
															</p>
														</div>
													</div>
													<div class="col-6 text-center pl-0">
														<div class="col-12 thumb">
															<i class="feather icon-camera f28"></i>
															<p class="use-web-link">
																<strong>Upload Image 4</strong>
																<br />
																<small>Or <a href="javascript:void(0)">use link from web</a></small>
															</p>
														</div>
													</div>
													<div class="col-6 text-center pl-0">
														<div class="col-12 thumb">
															<i class="feather icon-camera f28"></i>
															<p class="use-web-link">
																<strong>Upload Image 5</strong>
																<br />
																<small>Or <a href="javascript:void(0)">use link from web</a></small>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4 images-instructions">
										<ul>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
										</ul>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </section>

                <!--/ Contextual colors -->

                <!-- Text alignment -->
                <section id="text-alignment" class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="form-group">
                                	<label for="title">Product Title</label>
                                	<input type="text" class="form-control" required maxlength="100" placeholder="Product Title" />
                                </div>
                                <div class="row">
                                	<div class="col-sm-6">
                                		<div class="form-group">
											<label for="title">Brand</label>
											<input type="text" class="form-control" required maxlength="100" placeholder="Search brand here" />
										</div>	
                                	</div>
                                	<div class="col-sm-6">
                                		<div class="form-group">
											<label for="title">Product Code (SKU)</label>
											<input type="text" class="form-control" maxlength="100" />
										</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<label for="title">Short Description</label>
                                	<textarea class="form-control" placeholder="Enter Product Short Description" rows="4"></textarea>
                                </div>
									
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Text alignment -->

                <!-- Text transform -->
                <section id="text-transform" class="card overflow-hidden">
                    <div class="card-header">
                        <h4 class="card-title">Text transform</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <p>Transform text in components with text capitalization classes.</p>
                                <p>Note how <code class="highlighter-rouge">text-capitalize</code> only changes the first letter of each word,
                                    leaving the case of any other letters unaffected.</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0 table-mx-0">
                                <thead>
                                    <tr>
                                        <th>Example</th>
                                        <th>Classes</th>
                                        <th>Snippet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-lowercase">Lowercased text.</p>
                                        </td>
                                        <td><code>.text-lowercase</code></td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="text-lowercase"&gt;Lowercased text.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-uppercase">Uppercased text.</p>
                                        </td>
                                        <td><code>.text-uppercase</code></td>
                                        <td>
                                            <pre class="language-html">
                              <code class="language-html">
                                &lt;p class="text-uppercase"&gt;Uppercased text.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-capitalize">CapiTaliZed text.</p>
                                        </td>
                                        <td><code>.text-capitalize</code></td>
                                        <td>
                                            <pre class="language-html">
                              <code class="language-html">
                                &lt;p class="text-capitalize"&gt;CapiTaliZed text.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <!--/ Text transform -->

                <!-- Text option -->
                <section id="text-option" class="card overflow-hidden">
                    <div class="card-header">
                        <h4 class="card-title">Text option</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <h5 class="mb-1">Font size</h5>
                                <p>Vuexy Admin provide font large & small sizes variant classes to change font size.</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0 table-mx-0">
                                <thead>
                                    <tr>
                                        <th>Example</th>
                                        <th>Classes</th>
                                        <th>Snippet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="font-large-3">Large lg text size.</span>
                                        </td>
                                        <td>
                                            <code>.font-large-3</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="font-large-3" &gt;Large lg text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="font-large-2">Large lg text size.</span>
                                        </td>
                                        <td>
                                            <code>.font-large-2</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="font-large-2" &gt;Large lg text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="font-large-1">Large lg text size.</span>
                                        </td>
                                        <td>
                                            <code>.font-large-1</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="font-large-1" &gt;Large lg text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="font-medium-3">Large md text size.</span>
                                        </td>
                                        <td>
                                            <code>.font-medium-3</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="font-medium-3" &gt;Large md text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="font-medium-2">Large md text size.</span>
                                        </td>
                                        <td>
                                            <code>.font-medium-2</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="font-medium-2" &gt;Large md text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="font-medium-1">Large sm text size.</span>
                                        </td>
                                        <td>
                                            <code>.font-medium-1</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="font-medium-1" &gt;Large sm text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Normal base text size.</p>
                                        </td>
                                        <td>
                                            N/A
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt;Normal base text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="font-small-3">Small lg text size.</span>
                                        </td>
                                        <td>
                                            <code>.font-small-3</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="font-small-3" &gt;Small lg text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="font-small-2">Small md text size.</span>
                                        </td>
                                        <td>
                                            <code>.font-small-2</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="font-small-2" &gt;Small md text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="font-small-1">Small sm text size.</span>
                                        </td>
                                        <td>
                                            <code>.font-small-1</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="font-small-1" &gt;Small sm text size.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <h5 class="my-1">Font weight</h5>
                                <p>Vuexy Admin provide font weight class <code>.text-bold-{weight}</code>, where
                                    <code>{weight} value can be 300, 400, 500, 600, 700.</code></p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0 table-mx-0">
                                <thead>
                                    <tr>
                                        <th>Example</th>
                                        <th>Classes</th>
                                        <th>Snippet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-bold-300">Font weight 300</p>
                                        </td>
                                        <td><code>.text-bold-300</code></td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="text-bold-300"&gt;Font weight 300.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-bold-400">Font weight 400</p>
                                        </td>
                                        <td><code>.text-bold-400</code></td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="text-bold-400"&gt;Font weight 400.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-bold-600">Font weight 600</p>
                                        </td>
                                        <td><code>.text-bold-600</code></td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="text-bold-600"&gt;Font weight 600.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-bold-700">Font weight 700</p>
                                        </td>
                                        <td><code>.text-bold-700</code></td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p class="text-bold-700"&gt;Font weight 700.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <h5 class="my-1">Inline text elements</h5>
                                <p>Styling for common inline HTML5 elements.</p>
                                <p><code class="highlighter-rouge">.mark</code> and <code class="highlighter-rouge">.small</code> classes are
                                    also available to apply the same styles as <code class="highlighter-rouge">&lt;mark&gt;</code> and <code class="highlighter-rouge">&lt;small&gt;</code> while avoiding any unwanted semantic implications that the
                                    tags would bring.</p>
                                <p class="">While not shown above, feel free to use <code class="highlighter-rouge">&lt;b&gt;</code> and <code class="highlighter-rouge">&lt;i&gt;</code> in HTML5. <code class="highlighter-rouge">&lt;b&gt;</code> is
                                    meant to highlight words or phrases
                                    without conveying additional importance while <code class="highlighter-rouge">&lt;i&gt;</code> is mostly for
                                    voice, technical terms, etc.</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0 table-mx-0">
                                <thead>
                                    <tr>
                                        <th>Example</th>
                                        <th>Snippet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>You can use the mark tag to
                                                <mark>highlight</mark> text.</p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt;You can use the mark tag to &lt;mark&gt;highlight&lt;/mark&gt; text.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>
                                                <del>This line of text is meant to be treated as deleted text.</del>
                                            </p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt;&lt;del&gt;This line of text is meant to be treated as deleted text.&lt;/del&gt;&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>
                                                <s>This line of text is meant to be treated as no longer accurate.</s>
                                            </p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt;&lt;s&gt;This line of text is meant to be treated as no longer accurate.&lt;/s&gt;&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>
                                                This line of text
                                                <ins>is meant to be treated as an addition to the document.</ins>
                                            </p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt;&lt;ins&gt;This line of text is meant to be treated as an addition to the document.&lt;/ins&gt;&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><u>This line of text will render as underlined</u></p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt;&lt;u&gt;This line of text will render as underlined.&lt;/u&gt;&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><small>This line of text is meant to be treated as fine print.</small></p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt;&lt;small&gt;This line of text is meant to be treated as fine print.&lt;/small&gt;&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>This line rendered as bold text.</strong></p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt;&lt;strong&gt;This line rendered as bold text.&lt;/strong&gt;&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><em>This line rendered as italicized text.</em></p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt;&lt;em&gt;This line rendered as italicized text.&lt;/em&gt;&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Sample
                                                <abbr title="" data-popup="tooltip" data-original-title="Abbr title">abbreviation</abbr>
                                            </p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt; Sample &lt;abbr&gt;Abbreviations.&lt;/abbr&gt;&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Sample
                                                <abbr title="HyperText Markup Language" class="initialism">HTML</abbr> title.</p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt; Sample &lt;abbr title="HyperText Markup Language" class="initialism"&gt;HTML.&lt;/abbr&gt;&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <var>y</var> =
                                            <var>m</var>
                                            <var>x</var> +
                                            <var>b</var>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt; For indicating variables use the &lt;var&gt; tag.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Edit settings, press
                                                <kbd>
                                                    <kbd>ctrl</kbd> +
                                                    <kbd>,</kbd>
                                                </kbd>
                                            </p>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt; Use the &lt;kbd&gt;  to indicate input that is typically entered via keyboard.&lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <samp>This text is meant to be treated as sample output from a computer program.</samp>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt; For indicating sample output from a program use the  &lt;samp&gt;  tag. &lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <code>Inline code snippet</code>
                                        </td>
                                        <td>
                                            <pre class="language-html">
                              <code>
                                &lt;p&gt; Wrap inline snippets of code with &lt;code&gt; tag. &lt;/p&gt;</code>
                            </pre>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <!--/ Text option -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@include('layouts/footer')