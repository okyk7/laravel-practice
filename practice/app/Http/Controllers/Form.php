<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormPost;
use App\Services\Form\FormService;
use App\Facade\LibDate;
use App\Facade\LibDataStore;
use Illuminate\Support\Facades\DB;

/**
 *
 * @author okyk7
 *
 */
class Form extends Controller
{
    /**
     * トップ
     * @param Request $req
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function top(Request $req)
    {
        // 戻った場合
        if ($req->has('back')) {
            $this->flashOldInputToFlash($req);
        }

        // 生クエリ
        $users = DB::select('select * from user');

        // クエリビルダ
        $users = DB::table('user')->get();
        $first = DB::table('user')->where('id', 2)->first();
        var_dump($first);


        return view('Form.top')->with(['users' => $users]);
    }

    /**
     * 確認
     * @param FormPost $req
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function confirm(FormPost $req)
    {
        /*
         * controllerでやる場合
        $this->validate($req, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));
        */

        // complete用
        $req->flash();
        return view('Form.confirm')->with($req->input());
    }

    /**
     * 完了処理
     * @param Request $req
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function complete(Request $req)
    {
        // 戻るボタン時
        if ($req->input('submit') === 'back') {
            $this->flashOldInputToFlash($req);
            return redirect('/form?back=1');
        }

        /* サービス呼び出し
        $service = new FormService();
        $service->test();
        */

        /* 自作ファサード利用
        LibDataStore::addData(1);
        LibDataStore::addData(1);
        LibDataStore::addData(1);
        LibDataStore::addData('aa');
        var_dump(LibDataStore::getData());
        */

        // 生クエリ
        $insert = DB::insert('insert into user (name, email, value) values (?, ?, ?)', [
            $req->session()->getOldInput('name'),
            $req->session()->getOldInput('email'),
            $req->session()->getOldInput('value')]
        );
        if ($insert) {
            return redirect('/form');
        }

        // トランザクション
        /*
        DB::beginTransaction();
        DB::commit();
        DB::rollback();
        */
    }

    /**
     * oldInputを再度Flashする
     * @param Request $req
     */
    protected function flashOldInputToFlash(Request $req)
    {
        $req->session()->flashInput($req->session()->getOldInput());
    }
}
