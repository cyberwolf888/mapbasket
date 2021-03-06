@extends('layouts.master')

@push('plugin_css')
    <link href="{{ url('assets/master') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ url('assets/master') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')

    
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('master.dashboard') }}">Master</a>
        <span class="breadcrumb-item active">Reviews</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
        <h4>Reviews</h4>
        <p class="mg-b-0">Manage data Review.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">

        <div class="br-section-wrapper">
            {{-- <a href="{{ route('master.schedule.create') }}" class="btn btn-teal btn-with-icon"> 
              <div class="ht-40">
                <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                <span class="pd-x-15">Create New Data</span>
              </div>
            </a><br><br> --}}

            <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="wd-5p">No</th>
                                <th class="wd-20p">Club</th>
                                <th class="wd-25p">Lapangan</th>
                                <th class="wd-25p">Review</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-10p">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              @foreach ($model as $item)
                                <tr>
                                  <td>{{ $no }}</td>
                                  <td>{{ $item->club->nama }}</td>
                                  <td>{{ $item->lapangan->nama }}</td>
                                  <td>{{ strlen($item->review) > 50 ? substr($item->review,0,50)."..." : $item->review }}</td>
                                  <td>{{ $item->status_text }}</td>
                                  <td>
                                      @if($item->status == 2)
                                      <a href="javascript:void(0);" onclick="approve({{ $item->id }}, '{{ $item->review }}')" class="btn btn-success btn-icon"><div><i class="fa fa-check"></i></div></a>
                                      <a href="javascript:void(0);" onclick="reject({{ $item->id }}, '{{ $item->review }}')" class="btn btn-danger btn-icon"><div><i class="fa fa-times"></i></div></a>
                                      @endif
                                  </td>
                                  <?php $no++; ?>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
            </div>
        </div>

    </div><!-- br-pagebody -->

     <!-- BASIC MODAL -->
     <div id="modaldemo1" class="modal fade">
        
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::open(['method' => 'post', 'id'=>'form_verification']) !!}
            <input type="hidden" name="id" value="" id="schedule_id">
            <div class="modal-body pd-25">
              <h4 class="lh-3 mg-b-20" ><a href="#" class="tx-inverse hover-primary" id="title_modal"></a></h4>
              <p class="mg-b-5" id="review_ket"> </p>
              <div class="row mg-b-25">
                <div class="col-lg-12">
                    <div class="form-group mg-b-10-force">
                       {{-- {!! Form::textarea('keterangan', null,['id'=>'keterangan','class'=>'form-control','rows'=>'5']) !!} --}} 
                    </div>
                </div><!-- col-12 -->
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Save changes</button>
              <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->

@endsection

@push('plugin_scripts')
    <script src="{{ url('assets/master') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ url('assets/master') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ url('assets/master') }}/lib/select2/js/select2.min.js"></script>
@endpush

@push('scripts')
<script>
    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
      
    
    });

    function approve(id, ket){
      //alert('approve '+id);
      $('#schedule_id').val(id);
      $('#modaldemo1').modal('show'); 
      $('#title_modal').html('Are your sure to approve this review?');
      $('#review_ket').html(ket);
      $('#form_verification').attr('action', "<?= route('master.review.approve') ?>");
    }

    function reject(id, ket){
      //alert('reject '+id);
      $('#schedule_id').val(id);
      $('#modaldemo1').modal('show'); 
      $('#title_modal').html('Are your sure to reject this review?');
      $('#review_ket').html(ket);
      $('#form_verification').attr('action', "<?= route('master.review.reject') ?>");
    }
  </script>
@endpush