@extends('layouts.app')

@if ($options)
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ "Fill out this form to set configuration" }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('options.update', $options->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="put"></input>
                            <div class="form-group row">
                                <label for="currency" class="col-md-4 col-form-label text-md-right">{{ 'Currency' }}</label>
                                <div class="col-md-6">
                                    <select name="currency" class="custom-select">
                                    <option value="€">Euro (€)</option>
                                    <option value="$">Dollar ($)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tax_rate" class="col-md-4 col-form-label text-md-right">{{ __('Tax rate (%)') }}</label>
                                <div class="col-md-6">
                                    <input type="number" value={{$options->tax_rate}} name="tax_rate" class="form-control" autofocus required></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tax_inc_flag" class="col-md-4 col-form-label text-md-right">{{ __('Tax inclusion') }}</label>
                                <div class="col-md-6">
                                    <input type="checkbox" name="tax_inc_flag" class="form-check" value=1></input>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="global_discount" class="col-md-4 col-form-label text-md-right">{{ __('Global discount') }}</label>
                                <div class="col-md-6">
                                    <input type="number" value={{$options->global_discount}}  step="0.001" name="global_discount" class="form-control" required></input>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="global_discount_is_fixed" class="col-md-4 col-form-label text-md-right">{{ __('Type of global discount') }}</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="global_discount_is_fixed">
                                        <option value="fixed">fixed value</option>
                                        <option value="percent">percentage</option>
                                    </select>
                                    {{--<input type="checkbox" name="global_discount_is_fixed" class="form-check"></input>--}}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@else
<script type="text/javascript">
    window.location = "{{ url('/options') }}";
</script>
@endif
