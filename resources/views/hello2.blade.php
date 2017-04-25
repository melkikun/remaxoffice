<section id="search">
     <div class="top-tabs">
         <div class="container">
             <ul class="nav nav-tabs">
                 <li class="active"><a data-toggle="tab" href="#properties" aria-expanded="true"><i class="icon-home10"></i> Properties</a></li>
             </ul>
             <div class="tab-content clearfix">
                 <div id="properties" class="tab-pane fade in active">
                     <div class="search-options">
                         <div class="search-form">
                             {!! Form::open([
                                 "method"=>"get",
                                 "url"=>"search"
                                 ]) !!}
                                 <div class="form-inner">
                                     <div class="left-options col-md-12">
                                         <div class="form-section col-md-3">
                                             <label>Keyword</label>
                                             <input class="form-control" placeholder="Rumah, Apartemen" id="keyword" name="keyword">
                                         </div>
                                         <div class="form-section col-md-3">
                                             <label>Location</label>
                                             <input class="form-control" placeholder="Location, City" id="location" name="location">
                                         </div>
                                         <div class="form-section col-md-3">
                                             <label>Property Type</label>
                                             <div class="select-box">
                                                 <select class="form-control" name="type" id="type">
                                                     <option value="">All</option>
                                                     @if (count($propertytype['data'] > 0))
                                                     @foreach ($propertytype['data'] as $element)
                                                     <option value="{{$element['id']}}">{{$element['prtlName']}}</option>
                                                     @endforeach
                                                     @endif
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-section col-md-3">
                                             <label>Sale Type</label>
                                             <div class="select-box">
                                                 <select class="form-control" name="sale" id="sale">
                                                     <option value="">All</option>
                                                     @if (count($listingcategory['data'] > 0))
                                                     @foreach ($listingcategory['data'] as $element)
                                                     <option value="{{$element['id']}}">{{$element['lsclName']}}</option>
                                                     @endforeach
                                                     @endif
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="left-options col-md-12">
                                         <div class="form-section col-md-3">
                                             <label>Bathrooms</label>
                                             <div class="select-box">
                                                 <select class="form-control" name="bath" id="bath">
                                                     <option value="">-</option>
                                                     <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                     <option value="4">4</option>
                                                     <option value="5">5</option>
                                                     <option value="6">6</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-section col-md-3">
                                             <label>Bedrooms</label>
                                             <div class="select-box">
                                                 <select class="form-control" name="bed" id="bed">
                                                     <option value="">-</option>
                                                     <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                     <option value="4">4</option>
                                                     <option value="5">5</option>
                                                     <option value="6">6</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-section col-md-3">
                                             <label>Land Size M<sup>2</sup></label>
                                             <input class="form-control" placeholder="Eg : 100000" id="land" name="land">
                                         </div>
                                         <div class="form-section col-md-3">
                                             <label>Building Size M<sup>2</sup></label>
                                             <input class="form-control" placeholder="Eg : 100000" id="building" name="building">
                                         </div>
                                     </div>
                                     <div class="left-options col-md-12">
                                         <div class="form-section col-md-3">
                                             <label>Facility</label>
                                             <div class="select-box">
                                                 <select class="form-control" name="facility" id="facility">
                                                     <option value="">All</option>
                                                     @if (count($facility['data'] > 0))
                                                     @foreach ($facility['data'] as $element)
                                                     <option value="{{$element['id']}}">{{$element['fctlName']}}</option>
                                                     @endforeach
                                                     @endif
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-section col-md-3">
                                             <label>Price Range (Rp)</label>
                                             <input class="form-control" placeholder="Harga minimun" id="min" name="min">
                                         </div>
                                         <div class="form-section col-md-3">
                                             <label>&nbsp;</label>
                                             <input class="form-control" placeholder="Harga maximum" id="max" name="max">
                                         </div>
 
                                         <div class="form-section col-md-3">
                                             <label>&nbsp;</label>
                                             <input class="form-control btn btn-danger" id="search" name="search" type="submit" value="Search Property">
                                         </div>
                                     </div>
                                     {!! Form::close() !!}
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>