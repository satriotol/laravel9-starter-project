<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Berita;
use App\Models\BeritaCategory;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Kebijakan;
use App\Models\KebijakanCategory;
use App\Models\KonsistenBeranda;
use App\Models\KonsistenStep;
use App\Models\Link;
use App\Models\Master;
use App\Models\PpidProfile;
use App\Models\PPIDDasarHukum;
use App\Models\PpidLayananInformasi;
use App\Models\PpidInfopublic;
use App\Models\PpidInfopublicSubcategory;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\WbsAbout;
use App\Models\WbsBeranda;
use App\Models\WbsCategory;
use App\Models\WbsReport;
use App\Models\WbsStep;
use App\Models\UpgStep;
use App\Models\UpgBeranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Termwind\Components\Dd;

class IndexController extends Controller
{
    public function __construct()
    {
        $kegiatans = BeritaCategory::where('is_kegiatan', 1)->get();
        $masterBeritaCategories = BeritaCategory::where('is_kegiatan', null)->get();
        $layananLinks = Link::getLayananUtamaLink();
        $kebijakanCategories = KebijakanCategory::all();
        $terkaitLinks = Link::getTerkaitLink();
        $pengaduanLinks = Link::getPengaduanLink();
        $latestBeritas = Berita::getLatestBeritas(2, 2, '');
        $master = Master::first();
        $documentCategories = DocumentCategory::all();
        $whatsappLinks = Link::getWhatsappLink();
        View::share(compact('whatsappLinks', 'documentCategories', 'pengaduanLinks', 'kegiatans', 'masterBeritaCategories', 'kebijakanCategories', 'layananLinks', 'terkaitLinks', 'latestBeritas', 'master'));
    }
    public function beranda()
    {
        $sliders = Slider::all();
        $beranda = Beranda::first();
        $beritas = Berita::getLatestBeritas(6, 2, '');
        return view('frontend.beranda', compact('sliders', 'beritas', 'beranda'));
    }
    public function berita(Request $request)
    {
        $beritaCategories = BeritaCategory::getBeritaCategories();
        $beritas = Berita::getBeritas(6, null, '', $request);
        $recentBeritas = Berita::getLatestBeritas(3, null, '');
        $request->flash();
        return view('frontend.berita', compact('beritas', 'beritaCategories', 'recentBeritas'));
    }

    public function detailBerita(Berita $berita)
    {
        $beritaCategories = BeritaCategory::getBeritaCategories();
        $recentBeritas = Berita::getLatestBeritas(3, null, $berita->berita_category_id);
        return view('frontend.detailBerita', compact('berita', 'beritaCategories', 'recentBeritas'));
    }

    public function beritaCategory(BeritaCategory $beritaCategory, Request $request)
    {
        $beritaCategories = BeritaCategory::getBeritaCategories();
        $recentBeritas = Berita::getLatestBeritas(3, null, '');
        $beritas = Berita::getBeritas(6, null, $beritaCategory->id, $request);
        return view('frontend.berita', compact('beritas', 'beritaCategories', 'recentBeritas', 'beritaCategory'));
    }

    public function kegiatan(Request $request)
    {
        $beritaCategories = BeritaCategory::getKategoriCategories();
        $recentBeritas = Berita::getLatestBeritas(3, 1, '');
        $beritas = Berita::getBeritas(6, 1, '', $request);
        return view('frontend.berita', compact('beritas', 'beritaCategories', 'recentBeritas'));
    }
    public function kegiatanCategory(BeritaCategory $beritaCategory, Request $request)
    {
        $beritaCategories = BeritaCategory::getKategoriCategories();
        $recentBeritas = Berita::getLatestBeritas(3, 1, '');
        $beritas = Berita::getBeritas(6, 1, $beritaCategory->id, $request);
        return view('frontend.berita', compact('beritas', 'beritaCategories', 'recentBeritas', 'beritaCategory'));
    }
    public function detailKegiatan(Berita $berita)
    {
        $beritaCategories = BeritaCategory::getKategoriCategories();
        $recentBeritas = Berita::getLatestBeritas(3, 1, $berita->berita_category_id);
        return view('frontend.detailBerita', compact('berita', 'beritaCategories', 'recentBeritas'));
    }
    public function kebijakan(Request $request, $kebijakan)
    {

        $parameters = $request->search;
        $kebijakancategories = KebijakanCategory::where('id', $kebijakan)->first();
        $kebijakans = Kebijakan::getFrontenddata($kebijakan, $parameters)->paginate(5)->withQueryString();
        $request->flash();
        return view('frontend.kebijakan', compact('kebijakans', 'kebijakancategories'));
    }
    public function detailKebijakan(Request $request, Kebijakan $kebijakan)
    {
        return view('frontend.detailKebijakan', compact('kebijakan'));
    }
    public function ppidProfile()
    {
        $ppidProfile = PpidProfile::first();
        return view('frontend.ppidProfile', compact('ppidProfile'));
    }
    public function ppidProfileDasarHukum()
    {
        $ppidProfileDasarHukum = PPIDDasarHukum::first();
        return view('frontend.ppidProfileDasarHukum', compact('ppidProfileDasarHukum'));
    }
    public function ppidLayananHukum()
    {
        $ppidLayananHukums = PpidLayananInformasi::all()->paginate(5);
        return view('frontend.ppidProfileDasarHukum', compact('ppidProfileDasarHukum'));
    }
    public function ppidLayananInformasi(Request $request)
    {
        $aturlayananinformasi =  PpidLayananInformasi::where('type', 'Gambar')->first();

        $parameters = $request->search;
        $ppidLayananInformasis = PpidLayananInformasi::getFrontenddata($parameters);
        $request->flash();
        return view('frontend.ppidLayananInformasi', compact('ppidLayananInformasis', 'aturlayananinformasi'));
    }
    public function ppidInfoPublic()
    {
        $berkalas = PpidInfopublicSubcategory::whereHas('PpidInfopublics', function ($q){
            $q->where('category', 1);
        })->get();
        $setiapsaats = PpidInfopublicSubcategory::whereHas('PpidInfopublics', function ($q){
            $q->where('category', 2);
        })->get();
        $dikecualikans = PpidInfopublicSubcategory::whereHas('PpidInfopublics', function ($q){
            $q->where('category', 3);
        })->get();
        $sertamertas = PpidInfopublicSubcategory::whereHas('PpidInfopublics', function ($q){
            $q->where('category', 4);
        })->get();

        return view('frontend.ppidInfoPublic', compact('berkalas','setiapsaats','dikecualikans','sertamertas'));
    }
    public function profil()
    {
        $profiles = Profile::all();
        return view('frontend.profil', compact('profiles'));
    }
    public function documentCategory(DocumentCategory $documentCategory)
    {
        return view('frontend.detailDocument', compact('documentCategory'));
    }
    public function wbs()
    {
        $wbsAbout = WbsAbout::first();
        $wbsSteps = WbsStep::orderBy('number', 'asc')->get();
        $wbsCategories = WbsCategory::all();
        $wbsBeranda = WbsBeranda::first();
        return view('frontend.wbs', compact('wbsBeranda', 'wbsAbout', 'wbsSteps', 'wbsCategories'));
    }
    public function upg()
    {
        $upgSteps = UpgStep::orderBy('number', 'asc')->get();
        $upgBeranda = UpgBeranda::first();
        return view('frontend.upg', compact('upgBeranda', 'upgSteps'));
    }
    public function konsisten()
    {
        $konsistenBeranda = KonsistenBeranda::first();
        $konsistenSteps = KonsistenStep::orderBy('number', 'asc')->get();
        return view('frontend.konsisten', compact('konsistenSteps', 'konsistenBeranda'));
    }
    public function wbsStore(Request $request)
    {
        $data = $request->validate([
            'wbs_category_id' => 'required',
            'name' => 'required|max:30',
            'location' => 'required|max:50',
            'datetime' => 'required|date',
            'description' => 'required|max:100',
            'file' => 'required|mimes:pdf,jpg,png,jpeg',
            'captcha' => 'required|captcha',
            'phone' => 'required',
            'email' => 'nullable|email'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file_name = date('mdYHis') . '-' . $name;
            $file = $file->storeAs('file', $file_name, 'public_uploads');
            $data['file'] = $file;
        };
        WbsReport::create($data);
        session()->flash('success');
        return redirect(route('wbsReport.index'));
    }
}
