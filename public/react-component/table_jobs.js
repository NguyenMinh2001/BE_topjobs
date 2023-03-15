// validate a email with javascript


const ModalLoading = ({ show, success, closemodal,loading }) => {
  const showHideClassName = show ? 'modal-loading display-block' : 'modal-loading display-none';

  return (
    <div className={showHideClassName}>
      <div style={{alignSelf:"center",justifyContent:'center'}}  className='modal-loading-content'>
        <div style={{ justifyContent: 'center', alignItems: 'center',marginLeft: '40%',marginRight: '40%'}}>
          {loading && <div class="loader"></div>}
          {!loading && success && <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="" width={120} height={120}/>}
          
          {!loading && !success && <img src="https://www.safetydirect.ie/media/catalog/product/cache/0850e9227a745a9c00250207d917baf3/S/I/SIGN71814_a9ec.jpg" alt="" width={120} height={120}/>}
          
        </div>
        {loading && <p>Loading...</p>}
        {!loading && success && <><h4>đã gửi mail thành công</h4>
                         <a onClick={()=>{closemodal()}} href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">close</a>
                    </>}
        {!loading && !success && <><h4>Opo! vui lòng thử lại</h4>
                         <a onClick={()=>{closemodal()}} href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">close</a>
                    </>}
      </div>
    </div>
  );
};
const ModalPost = ({ show, closemodal, id }) => {
  const showHideClassName = show ? 'modal-loading display-block' : 'modal-loading display-none';

  return (
    <div className={showHideClassName}>
      <div style={{alignSelf:"center",justifyContent:'center'}}  className='modal-loading-content'>
        <div class="modal-header">
            <button onClick={()=>{closemodal()}} type="button" class="close">&times;</button>
        </div>
        <div style={{marginBottom: 50}} class="row justify-content-center">
             <h5>Vui lòng chọn phương thức ẩn bài viết!</h5>
        </div>
        <div class="d-flex justify-content-between">
             <a href={`/hide_job/${id}`}class="btn btn-sm btn-warning mb-0 d-none d-lg-block">Ẩn bài viết hết hạn</a>
             <a href={`/delete_job/${id}`} class="btn btn-sm btn-danger mb-0 d-none d-lg-block">Xóa bài viết vi phạm</a>
         </div>
        {/* {loading && <p>Loading...</p>}
        {!loading && success && <><h4>đã gửi mail thành công</h4>
                         <a onClick={()=>{closemodal()}} href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">close</a>
                    </>}
        {!loading && !success && <><h4>Opo! vui lòng thử lại</h4>
                         <a onClick={()=>{closemodal()}} href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">close</a>
                    </>} */}
      </div>
    </div>
  );
};

function Modal(props) {
    if(props.user.business__info == ""){
      return (<></>)
    }else{
    return (
      <div class="modal" style={{zIndex :'9999'}} id={"myModal"+props.user.id}>
      <div class="modal-dialog">
        <div class="modal-content">
        
  
          <div class="modal-header">
            <h4 class="modal-title">Thông tin xác thực</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <div class="modal-body">
          <div class="card card-profile">
              <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top"/>
              <div class="row justify-content-center">
                <div class="col-4 col-lg-4 order-lg-2">
                  <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                    <a href="javascript:;">
                      <img src={"api/image/"+props.user.avatar} class="rounded-circle img-fluid border border-2 border-white"/>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                <div class="d-flex justify-content-between">
                  <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                  <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                  <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                  <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="text-center mt-4">
                  <h5>
                    {props.user.name}
                  </h5>
                  <div class="h6 font-weight-300">
                    <i class="ni location_pin mr-2"></i>{props.user.business__info[0].phone}
                  </div>
                  <div class="h6 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>{props.user.business__info[0].address}
                  </div>
                  <div>
                    <i class="ni education_hat mr-2"></i>Giấy phép kinh doanh:
                    <img width="400" src={"/api/image/"+props.user.business__info[0].license}/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    ); }
  }
  
  function Listpage({ num_page, focus, setFocus }) {
    if (focus === num_page) {
      return (
        <li type="button" class="page-item "><p class='page-link isfocus'>{num_page}</p></li>
      )
    }
    return (
      <li type="button" onClick={() => (setFocus(num_page))} class="page-item "><p class='page-link'>{num_page}</p></li>
    )
  }
  
  function Table() {
    const [List_Jobs, setListJob] = React.useState([]);
    const [jobs, setJobs] = React.useState([]);
    const [jobsinpage, setjobsinpage] = React.useState([]);
    const [showMP,setShowMP] = React.useState(false);
    const [search, setSearch] = React.useState('')
    const [num_pages, setPagenum] = React.useState([]);
    const [showmodal,setShow] = React.useState(false);
    const [loading,setLoading] = React.useState(false);
    const [success,setSuccess] = React.useState(false);
    const [focus, setFocus] = React.useState(1);
    const [key_job,setKey]= React.useState(0);
    const listpage = num_pages.map((num_page) => <Listpage num_page={num_page} focus={focus} setFocus={setFocus} />);
    // fomatDatetime('2023-02-05T11:39:16.000000Z')
    React.useEffect(() => {
      axios.get('/api/List_Jobs')
        .then(response => {
          // console.log(response)
          setJobs(response.data)
          setListJob(response.data)
        }).catch(e => {
          console.log(e)
        })
    }, [])
  
    React.useEffect(() => {
      const NumOfPage = []
      const jobs_page = [];
      if (List_Jobs != '') {
        for (let i = 1; i < List_Jobs.length / 10 + 1; i++) {
          NumOfPage.push(i);
        }
  
        if (focus * 10 < List_Jobs.length) {
          for (let i = 10 * (focus - 1); i < focus * 10; i++) {
            jobs_page.push(List_Jobs[i])
          }
        } else {
          for (let i = 10 * (focus - 1); i < List_Jobs.length; i++) {
            jobs_page.push(List_Jobs[i])
          }
        }
  
      } else {
        NumOfPage.push(1)
      }
      setjobsinpage(jobs_page);
      setPagenum(NumOfPage);
    }, [focus, List_Jobs]);
  
    return (
      <>
      <ModalPost show={showMP} closemodal={()=>{setShowMP(false)}} id={key_job}/>
      <ModalLoading show={showmodal} success={success} closemodal={()=>setShow(false)} loading={loading}/>
      <div class="card mb-4">
        
        <div class="card-header pb-0">
          <div class="row">
            <h6 class="col">Danh sách việc làm</h6>
            <div class=" col-4 ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input value={search} onChange={(e) => {
  
                  setSearch(e.target.value)
                  setFocus(1);
                  const temp = [];
                  if (e.target.value == '') {
                    for (let index = 0; index < jobs.length; index++) {
                      temp.push(jobs[index])
                    }
                  } else {
                    for (let i = 0; i < jobs.length; i++) {
                      // console.log(jobs[i].name.indexOf(e.target.value)>=0 || jobs[i].email.indexOf(e.target.value)>=0);
                      if (jobs[i].title.indexOf(e.target.value) >= 0 || jobs[i].id == e.target.value || jobs[i].company.name.indexOf(e.target.value) >= 0) {
                        temp.push(jobs[i])
                      }
                    }
                  }
                  // console.log(temp)
                  setListJob(temp)
                }} type="text" class="form-control" placeholder="Type here..." />
              </div>
            </div>
          </div>
        </div>
  
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
  
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã Việc làm</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên công việc</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">thời hạn</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">công ty đăng tuyển</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ứng viên ứng tuyển</th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                {jobsinpage.map((jobsinpage) =>
                  <tr>
                    <td  class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{jobsinpage.id}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{jobsinpage.title}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      {jobsinpage.status === 'hiển thị' ? (<p class="text-xs font-weight-bold mb-0">{jobsinpage.status}</p>) : (<p class="text-danger font-weight-bold text-xs mb-0">{jobsinpage.status}</p>)} 
                    </td>
                    <td  class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{jobsinpage.deadline}</p>
                    </td>
                    <td  class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{jobsinpage.company.name}</p>
                    </td>
                    <td  class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{jobsinpage.applications_count}</p>
                    </td>   
                    <td  class="align-middle text-center text-sm">
                        <p type="button" class="text-xs font-weight-bold mb-0" onClick={()=>{
                          setLoading(true)
                          setShow(true)
                          axios.get(`/mail_job/${jobsinpage.id}`).then(
                            res => {
                            setSuccess(true)
                            setLoading(false)
                            }
                          ).catch(e =>{
                            setSuccess(false)
                            setLoading(false)
                          })
                        }}>gửi thông tin công việc</p>
                    </td> 
                    <td  class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">gửi thông tin ứng viên</p>
                    </td>   
                    <td  class="align-middle text-center text-sm">
                        <p onClick={()=>{
                          setKey(jobsinpage.id);
                          setShowMP(true)}} type='button' class="text-danger font-weight-bold text-xs mb-0">ẩn</p>
                    </td>   
                  </tr>
                )}
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer footer-table">
          <ul class="pagination">
            <li
              onClick={() => {
                if (focus > 1) {
                  setFocus(focus - 1)
                }
              }}
              type="button" class="page-item"><p class="page-link">Pre</p></li>
            {listpage}
            <li
              onClick={() => {
                if (focus < num_pages.length) {
                  setFocus(focus + 1)
                }
              }}
              type="button" class="page-item"><p class="page-link">Next</p></li>
          </ul>
        </div>
        {/* {userinpage.map((userinpage) => <Modal user = {userinpage}/>)} */}
      </div>
      </>
      
    );
  }
  
  ReactDOM.render(<Table />, document.getElementById("talbe-user"))
