@extends('layouts.dash')

@section('info')
<div class="container dash-home">
    <div class="row justify-content-center">
        <h2 class="section-title my-3">Overview</h2>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="status-card">
                                <div class="status-card__icon">
                                    <i class="bx bx-group"></i>
                                </div>
                                <div class="status-card__info">
                                    <h4>{{ $users->count() }}</h4>
                                    <span>Users</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="status-card">
                                <div class="status-card__icon">
                                    <i class="bx bx-paper-plane"></i>
                                </div>
                                <div class="status-card__info">
                                    <h4>{{ $photos->count() }}</h4>
                                    <span>Posts</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="status-card">
                                <div class="status-card__icon">
                                    <i class="bx bx-news"></i>
                                </div>
                                <div class="status-card__info">
                                    <h4>{{ $infos ? $infos->count() : 0 }}</h4>
                                    <span>Upcoming</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="status-card">
                                <div class="status-card__icon">
                                    <i class="bx bx-user-check"></i>
                                </div>
                                <div class="status-card__info">
                                    <h4>{{ $verified_users->count() }}</h4>
                                    <span>Verified</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="status-card">
                        <div class="status-card__icon">
                            <i class="bx bx-group"></i>
                        </div>
                        <div class="status-card__info">
                            <h4>74</h4>
                            <span>Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
